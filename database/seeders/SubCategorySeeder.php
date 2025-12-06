<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adventureCategory = Category::where('slug', 'adventure-tours')->first();
        $beachCategory = Category::where('slug', 'beach-holidays')->first();
        $culturalCategory = Category::where('slug', 'cultural-tours')->first();
        $mountainCategory = Category::where('slug', 'mountain-expeditions')->first();
        $cityCategory = Category::where('slug', 'city-breaks')->first();

        $subCategories = [];

        if ($adventureCategory) {
            $subCategories = array_merge($subCategories, [
                [
                    'category_id' => $adventureCategory->id,
                    'name' => 'Safari Tours',
                    'slug' => 'safari-tours',
                    'description' => 'Wildlife safari experiences',
                    'status' => 'active',
                    'sort_order' => 1,
                ],
                [
                    'category_id' => $adventureCategory->id,
                    'name' => 'Water Sports',
                    'slug' => 'water-sports',
                    'description' => 'Diving, snorkeling, and water activities',
                    'status' => 'active',
                    'sort_order' => 2,
                ],
                [
                    'category_id' => $adventureCategory->id,
                    'name' => 'Extreme Sports',
                    'slug' => 'extreme-sports',
                    'description' => 'Bungee jumping, skydiving, and more',
                    'status' => 'active',
                    'sort_order' => 3,
                ],
            ]);
        }

        if ($beachCategory) {
            $subCategories = array_merge($subCategories, [
                [
                    'category_id' => $beachCategory->id,
                    'name' => 'Tropical Beaches',
                    'slug' => 'tropical-beaches',
                    'description' => 'Tropical beach destinations',
                    'status' => 'active',
                    'sort_order' => 1,
                ],
                [
                    'category_id' => $beachCategory->id,
                    'name' => 'Mediterranean Coast',
                    'slug' => 'mediterranean-coast',
                    'description' => 'Mediterranean beach resorts',
                    'status' => 'active',
                    'sort_order' => 2,
                ],
            ]);
        }

        if ($culturalCategory) {
            $subCategories = array_merge($subCategories, [
                [
                    'category_id' => $culturalCategory->id,
                    'name' => 'Historical Sites',
                    'slug' => 'historical-sites',
                    'description' => 'Visit ancient historical sites',
                    'status' => 'active',
                    'sort_order' => 1,
                ],
                [
                    'category_id' => $culturalCategory->id,
                    'name' => 'Museums & Galleries',
                    'slug' => 'museums-galleries',
                    'description' => 'Cultural museums and art galleries',
                    'status' => 'active',
                    'sort_order' => 2,
                ],
            ]);
        }

        if ($mountainCategory) {
            $subCategories = array_merge($subCategories, [
                [
                    'category_id' => $mountainCategory->id,
                    'name' => 'Hiking Trails',
                    'slug' => 'hiking-trails',
                    'description' => 'Scenic hiking and trekking routes',
                    'status' => 'active',
                    'sort_order' => 1,
                ],
                [
                    'category_id' => $mountainCategory->id,
                    'name' => 'Mountain Climbing',
                    'slug' => 'mountain-climbing',
                    'description' => 'Professional mountain climbing expeditions',
                    'status' => 'active',
                    'sort_order' => 2,
                ],
            ]);
        }

        if ($cityCategory) {
            $subCategories = array_merge($subCategories, [
                [
                    'category_id' => $cityCategory->id,
                    'name' => 'European Cities',
                    'slug' => 'european-cities',
                    'description' => 'Explore European capitals',
                    'status' => 'active',
                    'sort_order' => 1,
                ],
                [
                    'category_id' => $cityCategory->id,
                    'name' => 'Asian Metropolises',
                    'slug' => 'asian-metropolises',
                    'description' => 'Discover Asian urban centers',
                    'status' => 'active',
                    'sort_order' => 2,
                ],
            ]);
        }

        foreach ($subCategories as $subCategory) {
            SubCategory::firstOrCreate(
                ['slug' => $subCategory['slug']],
                $subCategory
            );
        }

        $this->command->info('Sub Categories seeded successfully!');
    }
}
