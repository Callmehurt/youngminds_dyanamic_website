<?php

use Illuminate\Database\Seeder;

class FiscalYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fiscal_years')->truncate();
        $rows = [
            [
                'fy_name'=>'2017',
                'fy_start_date' => '2017-1-1',
                'fy_end_date' => '2017-12-30',


            ],


        ];
        DB::table('fiscal_years')->insert($rows);
    }
}
