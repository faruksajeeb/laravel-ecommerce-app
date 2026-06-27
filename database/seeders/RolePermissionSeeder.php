<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Create Role
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'superadmin']);
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleWriter = Role::firstOrCreate(['name' => 'writer']);
        $roleEditor = Role::firstOrCreate(['name' => 'editor']);
        $roleUser = Role::firstOrCreate(['name' => 'user']);

        $permissions = self::permissionsDefinition();
        foreach ($permissions as $group) {
            foreach ($group['permissions'] as $permData) {
                $permission = Permission::firstOrCreate(
                    ['name' => $permData['name']],
                    [
                        'group_name' => $group['group_name'],
                        'is_menu' => $permData['is_menu'],
                        'menu_name' => $permData['menu_name'],
                    ]
                );

                if (in_array($permData['name'], ['change.password', 'user.profile'])) {
                    foreach ([$roleSuperAdmin, $roleAdmin, $roleWriter, $roleEditor, $roleUser] as $role) {
                        $role->givePermissionTo($permission);
                    }
                } else {
                    $roleSuperAdmin->givePermissionTo($permission);
                }
            }
        }
    }

    public static function permissionsDefinition(): array
    {
        return [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    [
                        'name' => 'dashboard.view',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ]
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [
                    [
                        'name' => 'user.create',
                        'is_menu' => 'yes',
                        'menu_name' => 'Create User'
                    ],
                    [
                        'name' => 'user.edit',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'user.view',
                        'is_menu' => 'yes',
                        'menu_name' => 'Users'
                    ],
                    [
                        'name' => 'user.delete',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'user.import',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'user.export',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'user.profile',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'change.password',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ]
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    [
                        'name' => 'role.create',
                        'is_menu' => 'yes',
                        'menu_name' => 'Create Role'
                    ],
                    [
                        'name' => 'role.edit',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'role.view',
                        'is_menu' => 'no',
                        'menu_name' => 'Roles'
                    ],
                    [
                        'name' => 'role.delete',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ]
                ]
            ],
            [
                'group_name' => 'permission',
                'permissions' => [
                    [
                        'name' => 'permission.create',
                        'is_menu' => 'yes',
                        'menu_name' => 'Create Permission'
                    ],
                    [
                        'name' => 'permission.edit',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'permission.view',
                        'is_menu' => 'yes',
                        'menu_name' => 'Permissions'
                    ],
                    [
                        'name' => 'permission.delete',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    [
                        'name' => 'profile.edit',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'profile.view',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ]
                ]
            ],
            [
                'group_name' => 'settings',
                'permissions' => [
                    [
                        'name' => 'company.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'basic.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'theme.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'email.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'approval.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'invoice.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'notification.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'performance.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'salary.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'toxbox.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'cron.setting',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ]
                ]
            ],
            [
                'group_name' => 'option_group',
                'permissions' => [
                    [
                        'name' => 'option_group.view',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'option_group.create',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'option_group.edit',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'option_group.delete',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ]
                ]
            ],
            [
                'group_name' => 'option',
                'permissions' => [
                    [
                        'name' => 'option.view',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'option.create',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'option.edit',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'option.delete',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ]
                ]
            ]
        ];
    }
}
