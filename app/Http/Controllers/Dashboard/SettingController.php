<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Show the form for editing the settings.
     */
    public function edit()
    {
        $dahbiaCruisesName = Setting::get('dahbia_cruises_name', 'Dahbia Cruises');

        // Generate slug if not exists
        $dahbiaCruisesSlug = Setting::get('dahbia_cruises_slug');
        if (!$dahbiaCruisesSlug) {
            $dahbiaCruisesSlug = Str::slug($dahbiaCruisesName);
            Setting::set('dahbia_cruises_slug', $dahbiaCruisesSlug);
        }

        $phone = Setting::get('phone', '+20 101 515 7744 / +20 101 515 7746');
        $email = Setting::get('email', 'info@grandnilecruises.com');
        $address = Setting::get('address', 'Sarayah Zayed 2 Building, Apartment 1,<br>8th District<br>Sheikh Zayed City - Giza');
        $navbarLogo = Setting::get('navbar_logo');
        $footerLogo = Setting::get('footer_logo');

        return view('dashboard.settings.edit', compact(
            'dahbiaCruisesName',
            'phone',
            'email',
            'address',
            'navbarLogo',
            'footerLogo'
        ));
    }

    /**
     * Update the settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'dahbia_cruises_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'navbar_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle navbar logo upload
        if ($request->hasFile('navbar_logo')) {
            $logo = $request->file('navbar_logo');
            $logoName = time() . '_navbar_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $logoPath = $logo->storeAs('', $logoName, 'settings');

            // Delete old logo if exists
            $oldLogo = Setting::get('navbar_logo');
            if ($oldLogo && Storage::disk('settings')->exists($oldLogo)) {
                Storage::disk('settings')->delete($oldLogo);
            }

            Setting::set('navbar_logo', $logoPath);
        }

        // Handle footer logo upload
        if ($request->hasFile('footer_logo')) {
            $logo = $request->file('footer_logo');
            $logoName = time() . '_footer_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $logoPath = $logo->storeAs('', $logoName, 'settings');

            // Delete old logo if exists
            $oldLogo = Setting::get('footer_logo');
            if ($oldLogo && Storage::disk('settings')->exists($oldLogo)) {
                Storage::disk('settings')->delete($oldLogo);
            }

            Setting::set('footer_logo', $logoPath);
        }

        // Save other settings
        $oldSlug = Setting::get('dahbia_cruises_slug', 'dahbia-cruises');
        Setting::set('dahbia_cruises_name', $validated['dahbia_cruises_name']);

        // Generate slug from name automatically
        $slug = Str::slug($validated['dahbia_cruises_name']);
        Setting::set('dahbia_cruises_slug', $slug);

        Setting::set('phone', $validated['phone']);
        Setting::set('email', $validated['email']);
        Setting::set('address', $validated['address']);

        // Clear route cache if slug changed
        if ($oldSlug !== $slug) {
            Artisan::call('route:clear');
            Artisan::call('route:cache');
        }

        return redirect()->route('admin.settings.edit')
            ->with('success', 'Settings updated successfully');
    }
}
