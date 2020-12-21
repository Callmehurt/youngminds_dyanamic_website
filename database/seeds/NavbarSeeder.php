<?php

use Illuminate\Database\Seeder;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navbar_menus')->truncate();
        $rows = [
            [
                'parent_id' => '0',
                'menu_type_id' => '1',
                'menu_name' => 'Home',
                'site_url' => '',
                'module_url' => '/',
                'slug' => '',
                'display_order' => '1',
                'status' => '1',
            ],

            [
                'parent_id' => '0',
                'menu_type_id' => '1',
                'menu_name' => 'Contact',
                'site_url' => '',
                'module_url' => '/contact',
                'slug' => '',
                'display_order' => '2',
                'status' => '1',
            ],

            [
                'parent_id' => '0',
                'menu_type_id' => '1',
                'menu_name' => 'News',
                'site_url' => '',
                'module_url' => '/view/news',
                'slug' => '',
                'display_order' => '3',
                'status' => '1',
            ],

            [
                'parent_id' => '0',
                'menu_type_id' => '1',
                'menu_name' => 'Notice',
                'site_url' => '',
                'module_url' => '/view/notice',
                'slug' => '',
                'display_order' => '4',
                'status' => '1',
            ],

            [
                'parent_id' => '0',
                'menu_type_id' => '1',
                'menu_name' => 'Events',
                'site_url' => '',
                'module_url' => '/view/events',
                'slug' => '',
                'display_order' => '5',
                'status' => '1',
            ],

            [
                'parent_id' => '0',
                'menu_type_id' => '1',
                'menu_name' => 'downloads',
                'site_url' => '',
                'module_url' => '/view/downloads',
                'slug' => '',
                'display_order' => '6',
                'status' => '1',
            ],

        ];
        DB::table('navbar_menus')->insert($rows);
    }
}
