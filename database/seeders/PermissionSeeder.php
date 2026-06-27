<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = RolePermissionSeeder::permissionsDefinition();

        foreach ($permissions as $group) {
            foreach ($group['permissions'] as $permData) {
                Permission::firstOrCreate(
                    ['name' => $permData['name']],
                    [
                        'group_name' => $group['group_name'],
                        'is_menu' => $permData['is_menu'],
                        'menu_name' => $permData['menu_name'],
                    ]
                );
            }
        }
    }
}
