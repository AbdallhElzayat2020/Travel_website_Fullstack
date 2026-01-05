<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        // Get all settings in one query (cached)
        $settings = Setting::getAll();

        // Main menu name
        $mainCruisesMenuName = $settings['main_cruises_menu_name'] ?? 'Dahabiya & Cruises';

        // Group 1: Dahabiya Cruises
        $group1Name = $settings['cruise_group_1_name'] ?? 'Dahabiya Cruises';
        $group1Slug = $settings['cruise_group_1_slug'] ?? null;
        if (!$group1Slug) {
            $group1Slug = Str::slug($group1Name);
            Setting::set('cruise_group_1_slug', $group1Slug);
        }

        // Group 2: Ultra Deluxe Dahabiya
        $group2Name = $settings['cruise_group_2_name'] ?? 'Ultra Deluxe Dahabiya';
        $group2Slug = $settings['cruise_group_2_slug'] ?? null;
        if (!$group2Slug) {
            $group2Slug = Str::slug($group2Name);
            Setting::set('cruise_group_2_slug', $group2Slug);
        }

        // Group 3: Grand Nile Cruises
        $group3Name = $settings['cruise_group_3_name'] ?? 'Grand Nile Cruises';
        $group3Slug = $settings['cruise_group_3_slug'] ?? null;
        if (!$group3Slug) {
            $group3Slug = Str::slug($group3Name);
            Setting::set('cruise_group_3_slug', $group3Slug);
        }

        $phone = $settings['phone'] ?? '+20 101 515 7744 / +20 101 515 7746';
        $email = $settings['email'] ?? 'info@grandnilecruises.com';
        $address = $settings['address'] ?? 'Sarayah Zayed 2 Building, Apartment 1,<br>8th District<br>Sheikh Zayed City - Giza';
        $navbarLogo = $settings['navbar_logo'] ?? null;
        $footerLogo = $settings['footer_logo'] ?? null;

        return view('dashboard.settings.edit', compact(
            'mainCruisesMenuName',
            'group1Name',
            'group1Slug',
            'group2Name',
            'group2Slug',
            'group3Name',
            'group3Slug',
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
            'main_cruises_menu_name' => 'required|string|max:255',
            'cruise_group_1_name' => 'required|string|max:255',
            'cruise_group_1_slug' => 'nullable|string|max:255|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'cruise_group_2_name' => 'required|string|max:255',
            'cruise_group_2_slug' => 'nullable|string|max:255|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'cruise_group_3_name' => 'required|string|max:255',
            'cruise_group_3_slug' => 'nullable|string|max:255|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
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
            $settings = Setting::getAll();
            $oldLogo = $settings['navbar_logo'] ?? null;
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
            $settings = Setting::getAll();
            $oldLogo = $settings['footer_logo'] ?? null;
            if ($oldLogo && Storage::disk('settings')->exists($oldLogo)) {
                Storage::disk('settings')->delete($oldLogo);
            }

            Setting::set('footer_logo', $logoPath);
        }

        // Save cruise groups settings
        Setting::set('main_cruises_menu_name', $validated['main_cruises_menu_name']);

        // Group 1
        Setting::set('cruise_group_1_name', $validated['cruise_group_1_name']);
        $group1Slug = !empty($validated['cruise_group_1_slug'])
            ? Str::slug($validated['cruise_group_1_slug'])
            : Str::slug($validated['cruise_group_1_name']);
        Setting::set('cruise_group_1_slug', $group1Slug);

        // Group 2
        Setting::set('cruise_group_2_name', $validated['cruise_group_2_name']);
        $group2Slug = !empty($validated['cruise_group_2_slug'])
            ? Str::slug($validated['cruise_group_2_slug'])
            : Str::slug($validated['cruise_group_2_name']);
        Setting::set('cruise_group_2_slug', $group2Slug);

        // Group 3
        Setting::set('cruise_group_3_name', $validated['cruise_group_3_name']);
        $group3Slug = !empty($validated['cruise_group_3_slug'])
            ? Str::slug($validated['cruise_group_3_slug'])
            : Str::slug($validated['cruise_group_3_name']);
        Setting::set('cruise_group_3_slug', $group3Slug);

        Setting::set('phone', $validated['phone']);
        Setting::set('email', $validated['email']);
        Setting::set('address', $validated['address']);

        // Clear route cache
        Artisan::call('route:clear');
        Artisan::call('route:cache');

        return redirect()->route('admin.settings.edit')
            ->with('success', 'Settings updated successfully');
    }
}
