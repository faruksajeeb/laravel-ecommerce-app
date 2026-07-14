<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure option groups exist
        $groups = [
            ['option_group_name' => 'Color', 'created_by' => 3],
            ['option_group_name' => 'Size', 'created_by' => 3],
        ];

        foreach ($groups as $group) {
            DB::table('option_groups')->firstOrCreate(
                ['option_group_name' => $group['option_group_name']],
                ['created_by' => $group['created_by']]
            );
        }

        // Colors
        $colors = [
            'Red',
            'Blue',
            'Green',
        ];

        foreach ($colors as $color) {
            DB::table('options')->firstOrCreate(
                [
                    'option_group_name' => 'Color',
                    'option_value' => $color,
                ],
                [
                    'status' => 1,
                    'created_by' => 3,
                ]
            );
        }

        // Sizes
        $sizes = [
            'S',
            'M',
            'L',
            'XL',
        ];

        foreach ($sizes as $size) {
            DB::table('options')->firstOrCreate(
                [
                    'option_group_name' => 'Size',
                    'option_value' => $size,
                ],
                [
                    'status' => 1,
                    'created_by' => 3,
                ]
            );
        }

        $this->command->info('Product attributes (Colors and Sizes) seeded successfully!');
    }
}