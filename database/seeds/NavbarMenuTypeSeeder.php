<?php

use Illuminate\Database\Seeder;

class NavbarMenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navbar_menu_types')->truncate();
        $rows = [

            [
                'menu_type_name' => 'Module Menu'

            ],

            [
                'menu_type_name' => 'Page Menu'

            ],

            [
                'menu_type_name' => 'URL Menu'

            ],

        ];
        DB::table('navbar_menu_types')->insert($rows);
    }
}
