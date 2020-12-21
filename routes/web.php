<?php

use App\Http\Controllers\backend\news\NewsController;
use App\Http\Controllers\backend\notice\NoticeController;
use App\Http\Controllers\backend\event\EventController;
use App\Http\Controllers\backend\Download\DownloadController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\navbarMenuType\NavbarMenuTypeController;
use App\Http\Controllers\Backend\navbarMenu\NavbarMenuController;
use App\Http\Controllers\backend\message\MessageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Backend\page\PageController;
use App\Http\Controllers\Backend\carousel\CarouselController;


Auth::routes();
//Route::get('/', 'HomeController@index');


//Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/view/news', [FrontendController::class, 'news'])->name('frontend.news');
Route::get('/view/news/{news}', [FrontendController::class, 'getNews'])->name('frontend.getNews');
Route::get('/view/events', [FrontendController::class, 'events'])->name('frontend.events');
Route::get('/view/notice', [FrontendController::class, 'notices'])->name('frontend.notices');
Route::get('/view/notice/{notice}', [FrontendController::class, 'getNotice'])->name('frontend.getNotice');
Route::get('/view/notice/download/{notice}', [FrontendController::class, 'download_notice'])->name('frontend.notice.download');
Route::get('/view/downloads', [FrontendController::class, 'downloads'])->name('frontend.downloads');
Route::get('/download/{download}', [FrontendController::class, 'download_downloads'])->name('frontend.downloads.download');


//single page
Route::get('/view/{slug}', [FrontendController::class, 'getSinglePage'])->name('frontend.getSinglePage');

//contact message route
Route::post('/message', [MessageController::class, 'sendMessage'])->name('message.sendMessage');

//mail route
Route::post('/backend/send-mail', [MailController::class, 'index'])->name('sendMail.index');


//backend Routes
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::prefix('roles')->group(function () {
        Route::resource('/menu', 'Roles\MenuController');
        Route::get('/menu/menuControllerChangeStatus/{id}', 'Roles\MenuController@changeStatus');
        Route::resource('/group', 'Roles\UserGroupController');
        Route::get('/roleAccessIndex', 'Roles\RoleAccessController@index');
        Route::get('roleChangeAccess/{allowId}/{id}', 'Roles\RoleAccessController@changeAccess');
    });

    Route::resource('/user', 'UserController');
    Route::get('/user/status/{id}', 'UserController@status');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('profile/profilePic', 'UserController@profilePic');
    Route::post('/profile/password', 'UserController@password');

    Route::prefix('configurations')->group(function () {
        Route::resource('/designation', 'Configurations\DesignationController');
        Route::resource('/department', 'Configurations\DepartmentController');
        Route::resource('/fiscalYear', 'Configurations\FiscalYearController');
        Route::get('/fiscalYear/status/{id}', 'Configurations\FiscalYearController@status');
        Route::resource('/country', 'Configurations\CountryController');
        Route::get('/country/status/{id}', 'Configurations\CountryController@status');
        Route::resource('/pradesh', 'Configurations\PradeshController');
        Route::resource('/muniType', 'Configurations\MuniTypeController');
        Route::resource('/district', 'Configurations\DistrictController');
        Route::resource('/municipality', 'Configurations\MunicipalityController');
        Route::resource('/officeType', 'Configurations\OfficeTypeController');

        Route::resource('/office', 'Configurations\OfficeController');
        Route::get('/office/status/{id}', 'Configurations\OfficeController@status');


    });

    Route::prefix('logs')->group(function () {
        Route::get('/loginLogs', 'LogController@loginLogs');
        Route::get('/failLoginLogs', 'LogController@failLogin');
    });

    Route::resource('feedback','FeedbackController');

    //news routes
    Route::get('/backend/news', [NewsController::class, 'index'])->name('news.index');
    Route::post('/backend/news', [NewsController::class, 'store'])->name('news.store');
    Route::post('/backend/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::get('/backend/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/backend/news/{news}/update', [NewsController::class, 'update'])->name('news.update');

    //notice routes
    Route::get('/backend/notice', [NoticeController::class, 'index'])->name('notice.index');
    Route::post('/backend/notice', [NoticeController::class, 'store'])->name('notice.store');
    Route::post('/backend/notice/{notice}', [NoticeController::class, 'destroy'])->name('notice.destroy');
    Route::get('/backend/notice/{notice}/edit', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::put('/backend/notice/{notice}/update', [NoticeController::class, 'update'])->name('notice.update');


    //event routes
    Route::get('/backend/events', [EventController::class, 'index'])->name('event.index');
    Route::post('/backend/events', [EventController::class, 'store'])->name('event.store');
    Route::post('/backend/events/{event}', [EventController::class, 'destroy'])->name('event.destroy');
    Route::get('/backend/events/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/backend/events/{event}/update', [EventController::class, 'update'])->name('event.update');


    //download routes
    Route::get('/backend/downloads', [DownloadController::class, 'index'])->name('download.index');
    Route::post('/backend/downloads', [DownloadController::class, 'store'])->name('download.store');
    Route::get('/backend/downloads/{download}/edit', [DownloadController::class, 'edit'])->name('download.edit');
    Route::post('/backend/downloads/{download}', [DownloadController::class, 'destroy'])->name('download.destroy');
    Route::put('/backend/downloads/{download}/update', [DownloadController::class, 'update'])->name('download.update');


    //navbar menu type routes
    Route::get('/backend/navbar-menu-type', [NavbarMenuTypeController::class, 'index'])->name('navbarMenuType.index');
    Route::post('/backend/navbar-menu-type', [NavbarMenuTypeController::class, 'store'])->name('navbarMenuType.store');
    Route::get('/backend/navbar-menu-type/{navbarMenuType}/edit', [NavbarMenuTypeController::class, 'edit'])->name('navbarMenuType.edit');
    Route::put('/backend/navbar-menu-type/{navbarMenuType}/update', [NavbarMenuTypeController::class, 'update'])->name('navbarMenuType.update');
    Route::post('/backend/navbar-menu-type/{navbarMenuType}', [NavbarMenuTypeController::class, 'destroy'])->name('navbarMenuType.destroy');

    //navbar menu routes
    Route::get('/backend/navbar/menus', [NavbarMenuController::class, 'index'])->name('navbar.index');
    Route::post('/backend/navbar/menus', [NavbarMenuController::class, 'store'])->name('navbar.store');
    Route::get('/backend/navbar/menus/{navbar}/changeStatus', [NavbarMenuController::class, 'changeStatus'])->name('navbar.changeStatus');
    Route::get('/backend/navbar/menus/{navbar}/edit', [NavbarMenuController::class, 'edit'])->name('navbar.edit');
    Route::post('/backend/navbar/menus/{navbar}/delete', [NavbarMenuController::class, 'destroy'])->name('navbar.destroy');
    Route::put('/backend/navbar/menus/{navbar}', [NavbarMenuController::class, 'update'])->name('navbar.update');



    //pages routes
    Route::get('/backend/pages', [PageController::class, 'index'])->name('page.index');
    Route::get('/backend/pages/add', [PageController::class, 'addPage'])->name('page.add');
    Route::post('/backend/pages', [PageController::class, 'store'])->name('page.store');
    Route::post('/ckeditor/upload/image', [PageController::class, 'upload'])->name('ckeditor.upload');
    Route::get('/backend/pages/{page}/edits', [PageController::class, 'edit'])->name('page.edit');
    Route::put('/backend/pages/{page}/update', [PageController::class, 'update'])->name('page.update');
    Route::post('/backend/pages/{page}', [PageController::class, 'destroy'])->name('page.destroy');


    //carousel routes
    Route::get('/backend/carousel', [CarouselController::class, 'index'])->name('carousel.index');
    Route::post('/backend/carousel', [CarouselController::class, 'store'])->name('carousel.store');
    Route::get('/backend/carousel/{carousel}/edit', [CarouselController::class, 'edit'])->name('carousel.edit');
    Route::put('/backend/carousel/{carousel}/update', [CarouselController::class, 'update'])->name('carousel.update');
    Route::post('/backend/carousel/{carousel}', [CarouselController::class, 'destroy'])->name('carousel.destroy');
    Route::get('/backend/carousel/{navMenu}', [CarouselController::class, 'changeStatus'])->name('carousel.status');


    //Message routes
    Route::get('/backend/messages', [MessageController::class, 'index'])->name('message.index');
    Route::post('/backend/messages/{message}', [MessageController::class, 'destroy'])->name('message.destroy');

});
