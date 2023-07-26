<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\NationalConnectionController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\WWCSController;
use App\Http\Controllers\Backend\NationalAwardController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\UserManagement\RoleController;
use App\Http\Controllers\Backend\UserManagement\PermissionController;
use App\Http\Controllers\Frontend\AboutPagesController;
use App\Http\Controllers\Frontend\CouncilPagesController;
use App\Http\Controllers\Frontend\StudentsPagesController;
use App\Http\Controllers\Frontend\MembersPagesController;
use App\Http\Controllers\Frontend\RulesAndRegulationsPagesController;
use App\Http\Controllers\Frontend\PublicationsPagesController;
use App\Http\Controllers\Frontend\ContactPagesController;
use App\Http\Controllers\Frontend\ArticlesController;
use App\Http\Controllers\SettingsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

});

//Backend Routes

Route::group(['middleware' => 'auth', 'permission'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Default File Download Route
    Route::get('download/{filename}', [DefaultController::class, 'download'])->name('download');

    //User Management
    Route::group(['as' => 'um.', 'prefix' => 'user-management'], function () {

        //Role Management
        Route::group(['as' => 'role.', 'prefix' => 'role'], function () {
            Route::get('list',           [RoleController::class, 'index'])->name('role_list');
            Route::get('create',         [RoleController::class, 'create'])->name('role_create');
            Route::post('create',        [RoleController::class, 'store'])->name('role_create');
            Route::get('edit/{id}',      [RoleController::class, 'edit'])->name('role_edit');
            Route::put('edit/{id}',      [RoleController::class, 'update'])->name('role_edit');
            Route::get('delete/{id}', [RoleController::class, 'delete'])->name('role_delete');
        });

        //Permission Management
        Route::group(['as' => 'permission.','prefix' => 'permission'], function () {
            Route::get('list',          [PermissionController::class, 'index'])->name('list');
            Route::get('create',        [PermissionController::class, 'create'])->name('add');
            Route::post('store',        [PermissionController::class, 'store'])->name('store');
        });

    });

    // About Pages Routes
    Route::group(['as' => 'about.', 'prefix' => 'about'], function () {
        // FAQ Routes
        Route::group(['as' => 'faq.', 'prefix' => 'faq'], function () {
            Route::get('index', [FaqController::class, 'index'])->name('faq_list');
            Route::get('create', [FaqController::class, 'create'])->name('faq_create');
            Route::post('create', [FaqController::class, 'store'])->name('faq_create');
            Route::get('edit/{id}',      [FaqController::class, 'edit'])->name('faq_edit');
            Route::put('edit/{id}',      [FaqController::class, 'update'])->name('faq_edit');
            Route::get('delete/{id}', [FaqController::class, 'delete'])->name('faq_delete');
        });
    });

    // Service Routes
    Route::group(['as' => 'service.', 'prefix' => 'service'], function () {
        Route::get('index', [ServiceController::class, 'index'])->name('service_list');
        Route::get('create', [ServiceController::class, 'create'])->name('service_create');
        Route::post('create', [ServiceController::class, 'store'])->name('service_create');
        Route::get('edit/{id}',      [ServiceController::class, 'edit'])->name('service_edit');
        Route::put('edit/{id}',      [ServiceController::class, 'update'])->name('service_edit');
        Route::get('delete/{id}', [ServiceController::class, 'delete'])->name('service_delete');
    });
    // Contact Us Routes
    Route::group(['as' => 'contact.', 'prefix' => 'contact'], function () {
        Route::get('index', [ContactController::class, 'index'])->name('contact_create');
        Route::post('create/location', [ContactController::class, 'createLocation'])->name('location.contact_create');
        Route::post('create/social', [ContactController::class, 'createSocial'])->name('social.contact_create');
        Route::post('create/phone', [ContactController::class, 'createPhone'])->name('phone.contact_create');
        Route::post('create/email', [ContactController::class, 'createEmail'])->name('email.contact_create');
    });
    // National Connection Routes
    Route::group(['as' => 'national_connection.', 'prefix' => 'national_connection'], function () {
        Route::get('index', [NationalConnectionController::class, 'index'])->name('national_connection_list');
        Route::get('create', [NationalConnectionController::class, 'create'])->name('national_connection_create');
        Route::post('create', [NationalConnectionController::class, 'store'])->name('national_connection_create');
        Route::get('edit/{id}',      [NationalConnectionController::class, 'edit'])->name('national_connection_edit');
        Route::put('edit/{id}',      [NationalConnectionController::class, 'update'])->name('national_connection_edit');
        Route::get('status/{id}',      [NationalConnectionController::class, 'status'])->name('status.national_connection_edit');
        Route::get('delete/{id}', [NationalConnectionController::class, 'delete'])->name('national_connection_delete');
    });
    // Event Routes
    Route::group(['as' => 'event.', 'prefix' => 'event'], function () {
        Route::get('index', [EventController::class, 'index'])->name('event_list');
        Route::get('create', [EventController::class, 'create'])->name('event_create');
        Route::post('create', [EventController::class, 'store'])->name('event_create');
        Route::get('edit/{id}',      [EventController::class, 'edit'])->name('event_edit');
        Route::put('edit/{id}',      [EventController::class, 'update'])->name('event_edit');
        Route::get('status/{id}',      [EventController::class, 'status'])->name('status.event_edit');
        Route::get('delete/{id}', [EventController::class, 'delete'])->name('event_delete');
    });
    // World Wide CS Routes
    Route::group(['as' => 'wwcs.', 'prefix' => 'wwcs'], function () {
        Route::get('index', [WWCSController::class, 'index'])->name('wwcs_list');
        Route::get('create', [WWCSController::class, 'create'])->name('wwcs_create');
        Route::post('create', [WWCSController::class, 'store'])->name('wwcs_create');
        Route::get('edit/{id}',      [WWCSController::class, 'edit'])->name('wwcs_edit');
        Route::put('edit/{id}',      [WWCSController::class, 'update'])->name('wwcs_edit');
        Route::get('status/{id}',      [WWCSController::class, 'status'])->name('status.wwcs_edit');
        Route::get('delete/{id}', [WWCSController::class, 'delete'])->name('wwcs_delete');
    });
    // National Award Routes
    Route::group(['as' => 'national_award.', 'prefix' => 'national-award'], function () {
        Route::get('index', [NationalAwardController::class, 'index'])->name('national_award_list');
        Route::get('create', [NationalAwardController::class, 'create'])->name('national_award_create');
        Route::post('create', [NationalAwardController::class, 'store'])->name('national_award_create');
        Route::get('edit/{id}',      [NationalAwardController::class, 'edit'])->name('national_award_edit');
        Route::put('edit/{id}',      [NationalAwardController::class, 'update'])->name('national_award_edit');
        Route::get('status/{id}',      [NationalAwardController::class, 'status'])->name('status.national_award_edit');
        Route::get('featured/{id}',      [NationalAwardController::class, 'featured'])->name('featured.national_award_edit');
        Route::get('delete/{id}', [NationalAwardController::class, 'delete'])->name('national_award_delete');
    });
    // Blog Routes
    Route::group(['as' => 'blog.', 'prefix' => 'blog'], function () {
        Route::get('index', [BlogController::class, 'index'])->name('blog_list');
        Route::get('create', [BlogController::class, 'create'])->name('blog_create');
        Route::post('create', [BlogController::class, 'store'])->name('blog_create');
        Route::get('edit/{id}',      [BlogController::class, 'edit'])->name('blog_edit');
        Route::put('edit/{id}',      [BlogController::class, 'update'])->name('blog_edit');
        Route::get('single-file/delete/{id}/{key}',      [BlogController::class, 'singleFileDelete'])->name('single_file.delete.blog_edit');
        Route::get('permission/accept/{id}',      [BlogController::class, 'permissionAccept'])->name('permission.accept.blog_edit');
        Route::get('permission/decline/{id}',      [BlogController::class, 'permissionDecline'])->name('permission.decline.blog_edit');
        Route::get('featured/{id}',      [BlogController::class, 'featured'])->name('featured.blog_edit');
        Route::get('delete/{id}', [BlogController::class, 'delete'])->name('blog_delete');
    });




    // Site Settings
    Route::group(['as' => 'settings.', 'prefix' => 'site-settings'], function () {
        Route::get('index', [SettingsController::class, 'index'])->name('site_settings');
        Route::post('index', [SettingsController::class, 'store'])->name('site_settings');
    });

    // Banner Route
    Route::group(['as' => 'banner.', 'prefix' => 'banner'], function () {
        Route::get('index', [BannerController::class, 'index'])->name('banner_list');
        Route::get('create', [BannerController::class, 'create'])->name('banner_create');
        Route::get('create/{banner_id}', [BannerController::class, 'createImage'])->name('image.banner_create');
        Route::post('create', [BannerController::class, 'store'])->name('banner_create');
        Route::post('create/{banner_id}', [BannerController::class, 'storeImage'])->name('image.banner_create');
        Route::get('edit/image/{banner_id}',      [BannerController::class, 'editImage'])->name('image.banner_edit');
        Route::get('edit/{id}',      [BannerController::class, 'edit'])->name('banner_edit');
        Route::put('edit/{id}',      [BannerController::class, 'update'])->name('banner_edit');
        Route::put('edit/image/{banner_id}',      [BannerController::class, 'updateImage'])->name('image.banner_edit');
        Route::get('status/{id}',      [BannerController::class, 'status'])->name('status.banner_edit');
        Route::get('featured/{id}',      [BannerController::class, 'featured'])->name('featured.banner_edit');
        Route::get('image/delete/{id}',      [BannerController::class, 'deleteImage'])->name('image.banner_delete');
        Route::get('delete/{id}', [BannerController::class, 'delete'])->name('banner_delete');
    });


    // Member Module
    Route::group(['as' => 'member.', 'prefix' => 'member'], function () {
        Route::get('index', [MemberController::class, 'index'])->name('member_list');
        Route::get('create', [MemberController::class, 'create'])->name('member_create');
        Route::post('create', [MemberController::class, 'store'])->name('member_create');
        Route::get('edit/{id}', [MemberController::class, 'edit'])->name('member_edit');
        Route::put('edit/{id}', [MemberController::class, 'update'])->name('member_edit');
        Route::get('status/{id}', [MemberController::class, 'status'])->name('status.member_edit');
        Route::get('delete/{id}', [MemberController::class, 'delete'])->name('member_delete');


        Route::get('member-type/create', [MemberController::class, 'mt_create'])->name('member_type_create');
        Route::post('member-type/create', [MemberController::class, 'mt_store'])->name('member_type_create');
        Route::get('member-type/edit/{id}', [MemberController::class, 'mt_edit'])->name('member_type_edit');
        Route::put('member-type/edit/{id}', [MemberController::class, 'mt_update'])->name('member_type_edit');
        Route::get('member-type/status/{id}', [MemberController::class, 'mt_status'])->name('status.member_type_edit');
        Route::get('member-type/delete/{id}', [MemberController::class, 'mt_delete'])->name('member_type_delete');
    });

});


//Developer Routes
//This will export the permissions as csv for seeders
Route::get('/export-permissions', function () {
    $filename = 'permissions.csv';
    $filePath = createCSV($filename);

    return Response::download($filePath, $filename);
})->name('export.permissions');

//Frontend Routes

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::group(['as' => 'about.', 'prefix' => 'about'], function () {
    // Route::get('/icsb', [AboutPagesController::class, 'index'])->name('icsb');
    // Route::get('/council', [AboutPagesController::class, 'council'])->name('council');
    // Route::get('/csr-activities', [AboutPagesController::class, 'csrActivities'])->name('csr_activities');
    Route::get('/faq', [AboutPagesController::class, 'faq'])->name('faq');
    // Route::get('/assigned-officer', [AboutPagesController::class, 'assignedOfficer'])->name('assigned_officer');
});

// Route::group(['as' => 'council.', 'prefix' => 'council'], function () {
//     Route::get('/', [CouncilPagesController::class, 'council'])->name('council');
//     Route::get('/committee', [CouncilPagesController::class, 'committee'])->name('committee');
//     Route::get('/past-presidents', [CouncilPagesController::class, 'pastPresidents'])->name('past_presidents');
//     Route::get('/president', [CouncilPagesController::class, 'president'])->name('president');
//     Route::get('/previous-council', [CouncilPagesController::class, 'previousCouncil'])->name('previous_council');
// });
// Route::group(['as' => 'students.', 'prefix' => 'students'], function () {
//     Route::get('/world-wide-chartered-secretaries', [StudentsPagesController::class, 'wwcs'])->name('wwcs');
//     Route::get('/handbook', [StudentsPagesController::class, 'studentsHandbook'])->name('handbook');
//     Route::get('/notice-board', [StudentsPagesController::class, 'noticeBoard'])->name('notice_board');
//     Route::get('/eligibility', [StudentsPagesController::class, 'eligibility'])->name('eligibility');
//     Route::get('/exam-schedule', [StudentsPagesController::class, 'examSchedule'])->name('exam_schedule');
//     Route::get('/admission-rules', [StudentsPagesController::class, 'admissionRules'])->name('admission_rules');
//     Route::get('/admission-form', [StudentsPagesController::class, 'admissionForm'])->name('admission_form');

// });
Route::group(['as' => 'members.', 'prefix' => 'members'], function () {
    // Route::get('/council', [MembersPagesController::class, 'council'])->name('council');
    // Route::get('/fees', [MembersPagesController::class, 'fees'])->name('fees');
    // Route::get('/code-of-conduct', [MembersPagesController::class, 'codeOfConduct'])->name('code_of_conduct');
    // Route::get('/cpd-program', [MembersPagesController::class, 'cpdProgram'])->name('cpd_program');
    Route::get('/member-search/{type}', [MembersPagesController::class, 'memberSearch'])->name('m_search');

});
// Route::group(['as' => 'rules_and_regulations.', 'prefix' => 'rulse-&-regulations'], function () {
//     Route::get('/the-chartered-secretaries-act-2010', [RulesAndRegulationsPagesController::class, 'tcsa'])->name('tcsa');
//     Route::get('/the-chartered-secretaries-regulations-2011', [RulesAndRegulationsPagesController::class, 'tcsr'])->name('tcsr');
// });
// Route::group(['as' => 'publications.', 'prefix' => 'publications'], function () {
//     Route::get('/photo-gallery', [PublicationsPagesController::class, 'photoGallery'])->name('photo_gallery');
// });
Route::group(['as' => 'contact_us.', 'prefix' => 'contact'], function () {
    Route::get('/contact-us', [ContactPagesController::class, 'feedback'])->name('feedback');
});
// Route::group(['as' => 'article.', 'prefix' => 'article'], function () {
//     Route::get('/single', [ArticlesController::class, 'single'])->name('single');
// });



