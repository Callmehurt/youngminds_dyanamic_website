<?php

use Illuminate\Database\Seeder;

class ApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->truncate();
        $rows = [

            [
                'app_name' => 'Wanted and Most Wanted System',
                'app_api_end_point' => 'http://127.0.0.1:8000',
                'app_access_key' => 'access_token'

            ],
            [
                'app_name' => 'Case File Digitization System(CFD)',
                'app_api_end_point' => 'http://127.0.0.1:8000',
                'app_access_key' => 'access_token'

            ],
            [
                'app_name' => 'Missing, Found and Stolen',
                'app_api_end_point' => 'http://127.0.0.1:8000',
                'app_access_key' => 'access_token'

            ],
            [
                'app_name' => 'Missing, Found and Dead Body',
                'app_api_end_point' => 'http://127.0.0.1:8000',
                'app_access_key' => 'access_token'

            ],
            [
                'app_name' => 'Criminal Record Information System',
                'app_api_end_point' => 'http://127.0.0.1:8000',
                'app_access_key' => 'access_token'

            ],
            [
                'app_name' => 'AFFIS(Finger Print System',
                'app_api_end_point' => 'http://127.0.0.1:8000',
                'app_access_key' => 'access_token'

            ],
            [
                'app_name' => 'Gender Based Violence(GBV) Database System',
                'app_api_end_point' => 'http://127.0.0.1:8000',
                'app_access_key' => 'access_token'

            ],
        ];
        DB::table('applications')->insert($rows);
    }
}
