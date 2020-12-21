<?php

use Illuminate\Database\Seeder;

class SearchAccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('search_access_level')->truncate();
        $rows = [

            [
                'access_level' => 0,
                'access_name' => 'For All',
                'access_details' => 'No restriction',

            ],
            [
                'access_level' => 1,
                'access_name' => 'Private',
                'access_details' => 'Restricted and can search by authorized user',

            ],
            [
                'access_level' => 2,
                'access_name' => 'Confidential',
                'access_details' => 'Restricted and can search by authorized user with approval',

            ],
            [
                'access_level' => 3,
                'access_name' => 'Super Admin',
                'access_details' => 'Only Accessible for SuperAdmin',

            ],
        ];
        DB::table('search_access_level')->insert($rows);
    }
}
