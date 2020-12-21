<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->truncate();
        $rows = [
            [
                'parent_id' => '0',
                'menu_name' => 'Users',
                'menu_link' => '/user',
                'menu_controller' => 'UserController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-user-circle" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '2'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Roles',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-wrench" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '3'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Configuration',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '4'
            ],


            [
                'parent_id' => '0',
                'menu_name' => 'Logs',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-child" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '5'
            ],

            [
                'parent_id' => '2',
                'menu_name' => 'Menus',
                'menu_link' => '/roles/menu',
                'menu_controller' => 'MenuController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-list" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '0'
            ],

            [
                'parent_id' => '2',
                'menu_name' => 'User Groups',
                'menu_link' => '/roles/group',
                'menu_controller' => 'UserGroupController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-group" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '1'
            ],
            [
                'parent_id' => '2',
                'menu_name' => 'Role Access',
                'menu_link' => '/roles/roleAccessIndex',
                'menu_controller' => 'RoleAccessController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-unlock" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '2'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Designation',
                'menu_link' => '/configurations/designation',
                'menu_controller' => 'DesignationController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-address-card" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '3'
            ],

            [
                'parent_id' => '3',
                'menu_name' => 'Fiscal Year',
                'menu_link' => '/configurations/fiscalYear',
                'menu_controller' => 'FiscalYearController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-calendar-check-o" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '5'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Department',
                'menu_link' => '/configurations/department',
                'menu_controller' => 'DepartmentController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-building" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '1'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Country',
                'menu_link' => '/configurations/country',
                'menu_controller' => 'CountryController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-map-o" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '9'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Pradesh',
                'menu_link' => '/configurations/pradesh',
                'menu_controller' => 'PradeshController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-map-marker" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '10'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Municipality Type',
                'menu_link' => '/configurations/muniType',
                'menu_controller' => 'MuniTypeController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-map-signs" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '11'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'District',
                'menu_link' => '/configurations/district',
                'menu_controller' => 'DistrictController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-map-pin" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '13'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Municipality',
                'menu_link' => '/configurations/municipality',
                'menu_controller' => 'MunicipalityController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-map" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '13'

            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Office Type',
                'menu_link' => '/configurations/officeType',
                'menu_controller' => 'OfficeTypeController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-building" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '14'

            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Office',
                'menu_link' => '/configurations/office',
                'menu_controller' => 'OfficeController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-map" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '15'

            ],
            [
                'parent_id' => '4',
                'menu_name' => 'Login Logs',
                'menu_link' => '/logs/loginLogs',
                'menu_controller' => 'LogController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-user-plus" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '1'
            ],

            [
                'parent_id' => '4',
                'menu_name' => 'Failed Login Logs',
                'menu_link' => '/logs/failLoginLogs',
                'menu_controller' => 'LogController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-user-times" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '2'
            ],

            [
                'parent_id' => '0',
                'menu_name' => 'Pages',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-bars" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '20'
            ],

            [
                'parent_id' => '20',
                'menu_name' => 'News',
                'menu_link' => '/backend/news',
                'menu_controller' => 'NewsController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-newspaper-o" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '1'
            ],

            [
                'parent_id' => '20',
                'menu_name' => 'Notice',
                'menu_link' => '/backend/notice',
                'menu_controller' => 'NoticeController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-bullhorn" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '2'
            ],

            [
                'parent_id' => '20',
                'menu_name' => 'Events',
                'menu_link' => '/backend/events',
                'menu_controller' => 'EventController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-bell-o" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '3'
            ],

            [
                'parent_id' => '20',
                'menu_name' => 'Downloads',
                'menu_link' => '/backend/downloads',
                'menu_controller' => 'DownloadController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-download" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '4'
            ],

            [
                'parent_id' => '20',
                'menu_name' => 'Messages',
                'menu_link' => '/backend/messages',
                'menu_controller' => 'MessageController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-envelope" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '5'
            ],

            [
                'parent_id' => '0',
                'menu_name' => 'Page Management',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-bandcamp" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '21'
            ],


            [
                'parent_id' => '26',
                'menu_name' => 'Navbar Menu Type',
                'menu_link' => '/backend/navbar-menu-type',
                'menu_controller' => 'NavbarMenuTypeController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-arrows" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '1'
            ],

            [
                'parent_id' => '26',
                'menu_name' => 'Navbar Menu',
                'menu_link' => '/backend/navbar/menus',
                'menu_controller' => 'NavbarMenuController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-bookmark" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '2'
            ],

            [
                'parent_id' => '26',
                'menu_name' => 'Frontend Pages',
                'menu_link' => '/backend/pages',
                'menu_controller' => 'PageController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-file-text" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '3'
            ],

            [
                'parent_id' => '26',
                'menu_name' => 'Carousel',
                'menu_link' => '/backend/carousel',
                'menu_controller' => 'CarouselController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-arrows" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '4'
            ],

        ];
        DB::table('menus')->insert($rows);
    }
}
