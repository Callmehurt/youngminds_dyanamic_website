<?php

use Illuminate\Database\Seeder;

class SearchGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('search_group')->truncate();
        $rows = [

            [
                'group_name' => 'Date'

            ],
            [
                'group_name' => 'Location/Address'

            ],

            [
                'group_name' => 'Name',
            ],
            [
                'group_name' => 'Weapons'
            ],
            [
                'group_name' => 'Crime Type'

            ],
            [
                'group_name' => 'Phone/Mobile Number'

            ],
            [
                'group_name' => 'Email address'

            ],
            [
                'group_name' => 'Identity Numbers',
                'group_details' => 'Eg. Citizenship Number, Passport Number, PAN Number, License Number',

            ],
            [
                'group_name' => 'Huliya',
                'group_details' => 'Person Huliya Detals',

            ]
        ];
        DB::table('search_group')->insert($rows);
    }
}
