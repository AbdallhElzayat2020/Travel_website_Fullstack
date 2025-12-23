<?php

namespace Database\Seeders;

use App\Models\CruiseExperience;
use App\Models\CruiseExperienceImage;
use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CruiseExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'title' => 'Jade Dahabia',
                'slug' => 'jade-dahabia',
                'short_description' => 'Experience luxury on the Nile with our elegant Jade Dahabia cruise.',
                'description' => '<p>Embark on an unforgettable journey aboard the Jade Dahabia, a traditional Egyptian sailing vessel that combines authentic charm with modern luxury. Sail through the timeless landscapes of the Nile River, visiting ancient temples and experiencing the rich culture of Upper Egypt.</p>
                <h3>Highlights:</h3>
                <ul>
                    <li>Luxurious accommodations with panoramic views</li>
                    <li>Gourmet dining featuring local and international cuisine</li>
                    <li>Expert guides for temple visits and cultural experiences</li>
                    <li>Relaxing sun deck and spa facilities</li>
                    <li>Traditional Egyptian entertainment</li>
                </ul>',
                'meta_title' => 'Jade Dahabia Nile Cruise - Luxury Sailing Experience',
                'meta_description' => 'Discover the magic of the Nile aboard the elegant Jade Dahabia. Experience authentic Egyptian hospitality and visit ancient temples in ultimate comfort.',
                'meta_keywords' => 'Nile cruise, Dahabia, Egypt tours, luxury travel, ancient Egypt',
                'status' => 'active',
                'sort_order' => 1,
                'images' => ['destination-01.png', 'destination-02.png', 'destination-03.png', 'destination-04.png'],
            ],
            [
                'title' => 'Amber Dahabia',
                'slug' => 'amber-dahabia',
                'short_description' => 'Discover Egypt\'s treasures on the sophisticated Amber Dahabia cruise.',
                'description' => '<p>The Amber Dahabia offers an intimate and exclusive sailing experience on the Nile. With only a limited number of cabins, enjoy personalized service and attention to detail as you explore Egypt\'s most iconic historical sites.</p>
                <h3>Features:</h3>
                <ul>
                    <li>Intimate setting with limited guests</li>
                    <li>Spacious cabins with private balconies</li>
                    <li>Fine dining with Egyptian specialties</li>
                    <li>Complimentary guided tours</li>
                    <li>Wellness center and fitness facilities</li>
                </ul>',
                'meta_title' => 'Amber Dahabia Nile Cruise - Exclusive Sailing Experience',
                'meta_description' => 'Sail the Nile in style aboard the Amber Dahabia. Enjoy exclusive access to Egypt\'s ancient wonders with personalized service.',
                'meta_keywords' => 'Nile cruise, Dahabia, Egypt travel, exclusive tours, historical sites',
                'status' => 'active',
                'sort_order' => 2,
                'images' => ['destination-05.png', 'destination-06.png', 'destination-07.png', 'destination-08.png'],
            ],
        ];

        // Ensure upload directory exists
        $uploadDir = public_path('uploads/cruise-experiences');
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true);
        }

        foreach ($experiences as $experienceData) {
            $images = $experienceData['images'] ?? [];
            unset($experienceData['images']);

            $experience = CruiseExperience::firstOrCreate(
                ['slug' => $experienceData['slug']],
                $experienceData
            );

            // Add images if they don't exist
            if ($experience->images()->count() == 0 && !empty($images)) {
                foreach ($images as $index => $imageName) {
                    $sourcePath = public_path('assets/frontend/assets/images/' . $imageName);
                    if (file_exists($sourcePath)) {
                        $destinationPath = $uploadDir . '/' . $imageName;
                        copy($sourcePath, $destinationPath);

                        CruiseExperienceImage::create([
                            'cruise_experience_id' => $experience->id,
                            'image' => $imageName,
                            'sort_order' => $index + 1,
                        ]);
                    }
                }
            }

            // Attach some tours if available
            if ($experience->tours()->count() == 0) {
                $tours = Tour::active()->limit(3)->get();
                if ($tours->count() > 0) {
                    $experience->tours()->attach($tours->pluck('id')->toArray());
                }
            }
        }

        $this->command->info('Cruise Experiences seeded successfully!');
    }
}
