<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CruiseExperience;
use App\Models\CruiseExperienceImage;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class CruiseExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $groupKey = $request->get('group_key', 'dahabiya');

        $experiences = CruiseExperience::with('tours')
            ->byGroup($groupKey)
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15)
            ->appends(['group_key' => $groupKey]);

        return view('dashboard.cruise-experiences.index', compact('experiences', 'groupKey'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $groupKey = $request->get('group_key', 'dahabiya');
        $tours = Tour::active()
            ->orderBy('title')
            ->paginate(15);

        return view('dashboard.cruise-experiences.create', compact('tours', 'groupKey'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'group_key' => 'required|in:dahabiya,ultra,grand',
                'title' => 'required|string|max:255|unique:cruise_experiences,title',
                'slug' => 'nullable|string|max:255|unique:cruise_experiences,slug|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'short_description' => 'nullable|string',
                'description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'status' => 'required|in:active,inactive',
                'sort_order' => 'nullable|integer|min:0',
                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                'tour_ids' => 'nullable|array',
                'tour_ids.*' => 'exists:tours,id',
            ]);

            // Generate slug if not provided
            if (empty($validated['slug'])) {
                $validated['slug'] = Str::slug($validated['title']);
            } else {
                $validated['slug'] = Str::slug($validated['slug']);
            }

            $experience = CruiseExperience::create($validated);

            // Handle images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    if ($image && $image->isValid()) {
                        $imageName = time() . '_' . uniqid() . '_' . $index . '.' . $image->getClientOriginalExtension();
                        $path = $image->storeAs('', $imageName, 'cruise_experiences');

                        CruiseExperienceImage::create([
                            'cruise_experience_id' => $experience->id,
                            'image' => $path,
                            'sort_order' => $index,
                        ]);
                    }
                }
            }

            // Sync related tours
            if ($request->filled('tour_ids')) {
                $experience->tours()->sync($request->tour_ids);
            }

            return redirect()->route('admin.cruise-experiences.index')
                ->with('success', 'Cruise experience created successfully.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error creating cruise experience: ' . $e->getMessage());

            return back()
                ->with('error', 'An error occurred while creating the cruise experience. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $experience = CruiseExperience::with(['images', 'tours'])->findOrFail($id);

        return view('dashboard.cruise-experiences.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $experience = CruiseExperience::with('images', 'tours')->findOrFail($id);
        $groupKey = $request->get('group_key', $experience->group_key ?? 'dahabiya');
        $tours = Tour::active()->orderBy('title')->get();
        $selectedTourIds = $experience->tours->pluck('id')->toArray();

        return view('dashboard.cruise-experiences.edit', compact('experience', 'tours', 'selectedTourIds', 'groupKey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $experience = CruiseExperience::with('images')->findOrFail($id);

            $validated = $request->validate([
                'group_key' => 'required|in:dahabiya,ultra,grand',
                'title' => 'required|string|max:255|unique:cruise_experiences,title,' . $id,
                'slug' => 'nullable|string|max:255|unique:cruise_experiences,slug,' . $id . '|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'short_description' => 'nullable|string',
                'description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'status' => 'required|in:active,inactive',
                'sort_order' => 'nullable|integer|min:0',
                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                'deleted_images' => 'nullable|array',
                'deleted_images.*' => 'exists:cruise_experience_images,id',
                'tour_ids' => 'nullable|array',
                'tour_ids.*' => 'exists:tours,id',
            ]);

            // Generate slug if provided, otherwise keep existing
            if (!empty($validated['slug'])) {
                $validated['slug'] = Str::slug($validated['slug']);
            }

            $experience->update($validated);

            // Delete selected images
            if ($request->filled('deleted_images')) {
                $imagesToDelete = CruiseExperienceImage::whereIn('id', $request->deleted_images)->get();
                foreach ($imagesToDelete as $image) {
                    if ($image->image) {
                        Storage::disk('cruise_experiences')->delete($image->image);
                    }
                }
                CruiseExperienceImage::whereIn('id', $request->deleted_images)->delete();
            }

            // Add new images
            if ($request->hasFile('images')) {
                $currentMaxSort = $experience->images()->max('sort_order') ?? 0;
                foreach ($request->file('images') as $index => $image) {
                    if ($image && $image->isValid()) {
                        $imageName = time() . '_' . uniqid() . '_' . $index . '.' . $image->getClientOriginalExtension();
                        $path = $image->storeAs('', $imageName, 'cruise_experiences');

                        CruiseExperienceImage::create([
                            'cruise_experience_id' => $experience->id,
                            'image' => $path,
                            'sort_order' => $currentMaxSort + $index + 1,
                        ]);
                    }
                }
            }

            // Sync related tours
            if ($request->filled('tour_ids')) {
                $experience->tours()->sync($request->tour_ids);
            } else {
                $experience->tours()->detach();
            }

            return redirect()->route('admin.cruise-experiences.index')
                ->with('success', 'Cruise experience updated successfully.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating cruise experience: ' . $e->getMessage());

            return back()
                ->with('error', 'An error occurred while updating the cruise experience. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $experience = CruiseExperience::with('images')->findOrFail($id);

            // Delete images from disk
            foreach ($experience->images as $image) {
                if ($image->image) {
                    Storage::disk('cruise_experiences')->delete($image->image);
                }
            }

            $experience->delete();

            return redirect()->route('admin.cruise-experiences.index')
                ->with('success', 'Cruise experience deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting cruise experience: ' . $e->getMessage());

            return back()
                ->with('error', 'An error occurred while deleting the cruise experience. Please try again.');
        }
    }
}
