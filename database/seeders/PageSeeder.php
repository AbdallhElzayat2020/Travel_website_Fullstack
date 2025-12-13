<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'home',
                'name' => 'Home',
                'meta_title' => 'Home Page - Travel Website',
                'meta_description' => 'Discover amazing travel destinations and book your next adventure with us.',
                'meta_author' => 'Travel Website',
                'meta_keywords' => 'travel, tours, destinations, booking',
            ],
            [
                'slug' => 'about-us',
                'name' => 'About Us',
                'meta_title' => 'About Us - Travel Website',
                'meta_description' => 'Learn more about our travel agency and our mission to provide the best travel experiences.',
                'meta_author' => 'Travel Website',
                'meta_keywords' => 'about, travel agency, company',
            ],
            [
                'slug' => 'blogs',
                'name' => 'Blogs',
                'meta_title' => 'Travel Blogs - Travel Website',
                'meta_description' => 'Read our latest travel blogs, tips, and destination guides.',
                'meta_author' => 'Travel Website',
                'meta_keywords' => 'travel blog, tips, guides, destinations',
            ],
            [
                'slug' => 'galleries',
                'name' => 'Galleries',
                'meta_title' => 'Photo Galleries - Travel Website',
                'meta_description' => 'Browse our photo galleries from amazing travel destinations around the world.',
                'meta_author' => 'Travel Website',
                'meta_keywords' => 'gallery, photos, travel photos, destinations',
            ],
            [
                'slug' => 'contact-us',
                'name' => 'Contact Us',
                'meta_title' => 'Contact Us - Travel Website',
                'meta_description' => 'Get in touch with us for travel inquiries, bookings, and support.',
                'meta_author' => 'Travel Website',
                'meta_keywords' => 'contact, travel contact, inquiry, support',
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );
        }
    }
}
