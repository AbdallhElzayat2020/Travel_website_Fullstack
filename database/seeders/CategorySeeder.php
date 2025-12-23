<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // List of allowed category slugs (only these will be kept)
        $allowedSlugs = ['nile-cruises', 'dahbia-tours', 'tour-egypt-packages'];

        // Delete all categories that are not in the allowed list
        Category::whereNotIn('slug', $allowedSlugs)->delete();

        $categories = [
            [
                'name' => 'Nile Cruises',
                'slug' => 'nile-cruises',
                'description' => '<p>Discover the magic of Egypt with our luxurious Nile cruise experiences. Sail through history on the world\'s longest river, visiting ancient temples, tombs, and breathtaking landscapes.</p>',
                'image' => 'destination-01.png',
                'status' => 'active',
                'sort_order' => 1,
                'grid_columns' => '4',
                'header_background_color' => '#f8f9fa',
                'header_text_color' => '#000000',
                'card_style' => 'default',
                'show_breadcrumb' => true,
                'show_description' => true,
            ],
            [
                'name' => 'Dahbia Tours',
                'slug' => 'dahbia-tours',
                'description' => '<p>Explore Egypt\'s most beautiful destinations with our curated Dahbia tours. From historical sites to modern attractions, experience the best of what Egypt has to offer.</p>',
                'image' => 'destination-02.png',
                'status' => 'active',
                'sort_order' => 2,
                'grid_columns' => '3',
                'header_background_color' => '#ffffff',
                'header_text_color' => '#000000',
                'card_style' => 'modern',
                'show_breadcrumb' => true,
                'show_description' => true,
            ],
            [
                'name' => 'Tour Egypt Packages',
                'slug' => 'tour-egypt-packages',
                'description' => '<p>Comprehensive travel packages covering Egypt\'s top destinations. All-inclusive tours designed to give you the ultimate Egyptian experience.</p>',
                'image' => 'destination-03.png',
                'status' => 'active',
                'sort_order' => 3,
                'grid_columns' => '4',
                'header_background_color' => '#f0f0f0',
                'header_text_color' => '#333333',
                'card_style' => 'default',
                'show_breadcrumb' => true,
                'show_description' => true,
            ],
        ];

        foreach ($categories as $categoryData) {
            $image = $categoryData['image'] ?? null;
            unset($categoryData['image']);

            // Check if image exists before creating category
            if ($image) {
                $sourcePath = public_path('assets/frontend/assets/images/' . $image);
                if (!file_exists($sourcePath)) {
                    // Skip this category if image doesn't exist
                    continue;
                }
            } else {
                // Skip categories without images
                continue;
            }

            $category = Category::firstOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );

            // Copy image if provided and category doesn't have image
            if ($image && !$category->image) {
                $destinationPath = public_path('uploads/categories/' . $image);
                if (!file_exists(public_path('uploads/categories'))) {
                    mkdir(public_path('uploads/categories'), 0755, true);
                }
                copy($sourcePath, $destinationPath);
                $category->update(['image' => $image]);
            }
        }

        $this->command->info('Categories seeded successfully!');
    }
}
