<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CategorySubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Create default option groups using firstOrCreate to avoid duplicates
        DB::table('categories')->insertOrIgnore([
            ['name' => 'Man', 'created_by' => 3],
            ['name' => 'Woman', 'created_by' => 3],
            ['name' => 'Kids', 'created_by' => 3],
        ]);

        $subcategories = [
            [
                'category_id' => 1,
                'name' => 'Shirts',
                'created_by' => 3
            ],
            [
                'category_id' => 1,
                'name' => 'Pants',
                'created_by' => 3
            ],
            [
                'category_id' => 2,
                'name' => 'Dresses',
                'created_by' => 3
            ],
            [
                'category_id' => 2,
                'name' => 'Skirts',
                'created_by' => 3
            ],
            [
                'category_id' => 3,
                'name' => 'Toys',
                'created_by' => 3
            ],
            [
                'category_id' => 3,
                'name' => 'Clothes',
                'created_by' => 3
            ],
        ];

        foreach ($subcategories as $subcategory) {
            DB::table('subcategories')->insertOrIgnore([
                'category_id' => $subcategory['category_id'],
                'subcategory_name' => $subcategory['name'],
                'created_by' => $subcategory['created_by'],
            ]);
        }
    }
}