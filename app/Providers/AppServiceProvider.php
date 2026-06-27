<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
    use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        // Menu permissions
        if (Schema::hasTable('permissions')) {
            $data = Permission::select('group_name')
                ->where([
                    'status' => 1,
                    'guard_name' => 'web',
                    'is_menu' => 'yes'
                ])
                ->groupBy('group_name')
                ->get();

            view()->share('menu_groups', $data);
        }

        // Company settings
        if (Schema::hasTable('company_settings')) {

            if (Cache::has('company_settings')) {
                $companySettings = Cache::get('company_settings');
            } else {
                $companySettings = DB::table('company_settings')->first();
                Cache::put('company_settings', $companySettings);
            }

            view()->share('company_settings', $companySettings);
        }
    }
}
