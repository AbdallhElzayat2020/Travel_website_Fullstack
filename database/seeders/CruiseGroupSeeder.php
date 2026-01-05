<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CruiseGroup;

class CruiseGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Dahabiya Cruises',
                'slug' => 'dahabiya-cruises',
                'group_key' => 'dahabiya',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'name' => 'Ultra Deluxe Dahabiya',
                'slug' => 'ultra-deluxe-dahabiya',
                'group_key' => 'ultra',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'name' => 'Grand Nile Cruises',
                'slug' => 'grand-nile-cruises',
                'group_key' => 'grand',
                'sort_order' => 3,
                'status' => 'active',
            ],
        ];

        foreach ($groups as $group) {
            CruiseGroup::updateOrCreate(
                ['group_key' => $group['group_key']],
                $group
            );
        }
    }
}
