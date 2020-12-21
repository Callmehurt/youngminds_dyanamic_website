<?php

use Illuminate\Database\Seeder;

class UserGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->truncate();
        $rows = [
            [
                'group_name' => 'Super Admin',
                'group_details' => ''
            ],
            [
                'group_name' => 'Admin',
                'group_details' => ''
            ]
        ];
        DB::table('user_groups')->insert($rows);
    }
}
