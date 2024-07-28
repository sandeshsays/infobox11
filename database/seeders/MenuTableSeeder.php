<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'parent_id' => null,
                'menu_name' => 'Dashboard',
                'menu_name_np' => 'ड्यासबोर्ड',
                'menu_controller' => 'DashboardController',
                'menu_link' => '/app',
                'menu_icon' => 'fa fa-dashboard',
                'menu_status' => true,
                'action_module_status' => false,
                'menu_order' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null,
                'menu_module' => 'Main',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => null,
                'menu_name' => 'Settings',
                'menu_name_np' => 'सेटिङ',
                'menu_controller' => 'SettingsController',
                'menu_link' => '/settings',
                'menu_icon' => 'settings_icon',
                'menu_status' => true,
                'action_module_status' => false,
                'menu_order' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null,
                'menu_module' => 'Main',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'parent_id' => 2,
                'menu_name' => 'MasterSetting',
                'menu_name_np' => 'मास्टर सेटिङ',
                'menu_controller' => 'MasterSettingsController',
                'menu_link' => '/master-settings',
                'menu_icon' => 'settings_icon',
                'menu_status' => true,
                'action_module_status' => false,
                'menu_order' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null,
                'menu_module' => 'Main',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'parent_id' => null,
                'menu_name' => 'Report',
                'menu_name_np' => 'रिपोर्ट',
                'menu_controller' => 'ReportCOntroller',
                'menu_link' => '',
                'menu_icon' => 'settings_icon',
                'menu_status' => true,
                'action_module_status' => false,
                'menu_order' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null,
                'menu_module' => 'Main',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'parent_id' => 4,
                'menu_name' => 'ChalaniReport',
                'menu_name_np' => 'चलानी रिपोर्ट',
                'menu_controller' => 'ReportCOntroller',
                'menu_link' => '',
                'menu_icon' => 'settings_icon',
                'menu_status' => true,
                'action_module_status' => false,
                'menu_order' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null,
                'menu_module' => 'Main',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 5,
                'menu_name' => 'ChalaniReport',
                'menu_name_np' => 'चलानी रिपोर्ट',
                'menu_controller' => 'ReportCOntroller',
                'menu_link' => '',
                'menu_icon' => 'settings_icon',
                'menu_status' => true,
                'action_module_status' => false,
                'menu_order' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null,
                'menu_module' => 'Main',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('menus')->insert($menus);

    }
}
