<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $countries = "INSERT INTO `countries` VALUES

(1,'India','IND', 'active', NULL, NULL , NULL),
(2,'America','USA', 'active', NULL, NULL , NULL),
(3,'China','CHINA', 'active', NULL, NULL , NULL),
(4,'Canada','CANADA', 'active', NULL, NULL , NULL),
(5,'Nepal','NPL', 'active', NULL, NULL , NULL)

";
        DB::select( DB::raw($countries));
    }
}
