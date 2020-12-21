<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(MenusTableSeeder::class);
        $this->call(DesignationsTableSeeder::class);

        $this->call(UserGroupsTableSeeder::class);
        $this->call(FiscalYearsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(PradeshSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(MuniTypeSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(NavbarMenuTypeSeeder::class);
        $this->call(NavbarSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
