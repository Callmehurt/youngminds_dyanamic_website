<?php

use Illuminate\Database\Seeder;

class MuniTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $muniTyep="INSERT INTO `muni_types` VALUES
(1, 'महानगरपालिका', NULL, NULL, NULL),
(2, 'उपमहानगरपालिका', NULL, NULL, NULL),
(3, 'नगरपालिका', NULL, NULL, NULL),
(4, 'गाउँपालिका', NULL, NULL, NULL)";

        DB::select(DB::raw($muniTyep));
    }
}
