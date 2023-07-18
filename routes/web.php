<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\EventController;
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


//Frontend Routes

Route::get('/', [HomePageController::class, 'index'])->name('home');


//Backend Routes

Route::group(['middleware' => 'auth', 'permission'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
    // Event Routes
    Route::group(['as' => 'event.', 'prefix' => 'event'], function () {
        Route::get('index', [EventController::class, 'index'])->name('event_list');
        Route::get('create', [EventController::class, 'create'])->name('event_create');
        Route::post('create', [EventController::class, 'store'])->name('event_create');
        Route::get('edit/{id}',      [EventController::class, 'edit'])->name('event_edit');
        Route::put('edit/{id}',      [EventController::class, 'update'])->name('event_edit');
        Route::get('delete/{id}', [EventController::class, 'delete'])->name('event_delete');
    });


});


//Developer Routes
//This will export the permissions as csv for seeders
Route::get('/export-permissions', function () {
    $filename = 'permissions.csv';
    $filePath = createCSV($filename);

    return Response::download($filePath, $filename);
})->name('export.permissions');


Route::group(['as' => 'about.', 'prefix' => 'about'], function () {
    Route::get('/icsb', [AboutPagesController::class, 'index'])->name('icsb');
    Route::get('/council', [AboutPagesController::class, 'council'])->name('council');
    Route::get('/csr-activities', [AboutPagesController::class, 'csrActivities'])->name('csr_activities');
    Route::get('/faq', [AboutPagesController::class, 'faq'])->name('faq');
    Route::get('/assigned-officer', [AboutPagesController::class, 'assignedOfficer'])->name('assigned_officer');
});

Route::group(['as' => 'council.', 'prefix' => 'council'], function () {
    Route::get('/', [CouncilPagesController::class, 'council'])->name('council');
    Route::get('/committee', [CouncilPagesController::class, 'committee'])->name('committee');
    Route::get('/past-presidents', [CouncilPagesController::class, 'pastPresidents'])->name('past_presidents');
    Route::get('/president', [CouncilPagesController::class, 'president'])->name('president');
    Route::get('/previous-council', [CouncilPagesController::class, 'previousCouncil'])->name('previous_council');
});
Route::group(['as' => 'students.', 'prefix' => 'students'], function () {
    Route::get('/world-wide-chartered-secretaries', [StudentsPagesController::class, 'wwcs'])->name('wwcs');
    Route::get('/handbook', [StudentsPagesController::class, 'studentsHandbook'])->name('handbook');
    Route::get('/notice-board', [StudentsPagesController::class, 'noticeBoard'])->name('notice_board');
    Route::get('/eligibility', [StudentsPagesController::class, 'eligibility'])->name('eligibility');
    Route::get('/exam-schedule', [StudentsPagesController::class, 'examSchedule'])->name('exam_schedule');
    Route::get('/admission-rules', [StudentsPagesController::class, 'admissionRules'])->name('admission_rules');
    Route::get('/admission-form', [StudentsPagesController::class, 'admissionForm'])->name('admission_form');

});
Route::group(['as' => 'members.', 'prefix' => 'members'], function () {
    Route::get('/council', [MembersPagesController::class, 'council'])->name('council');
    Route::get('/fees', [MembersPagesController::class, 'fees'])->name('fees');
    Route::get('/code-of-conduct', [MembersPagesController::class, 'codeOfConduct'])->name('code_of_conduct');
    Route::get('/cpd-program', [MembersPagesController::class, 'cpdProgram'])->name('cpd_program');

});
Route::group(['as' => 'rules_and_regulations.', 'prefix' => 'rulse-&-regulations'], function () {
    Route::get('/the-chartered-secretaries-act-2010', [RulesAndRegulationsPagesController::class, 'tcsa'])->name('tcsa');
    Route::get('/the-chartered-secretaries-regulations-2011', [RulesAndRegulationsPagesController::class, 'tcsr'])->name('tcsr');
});
Route::group(['as' => 'publications.', 'prefix' => 'publications'], function () {
    Route::get('/photo-gallery', [PublicationsPagesController::class, 'photoGallery'])->name('photo_gallery');
});
Route::group(['as' => 'contact_view.', 'prefix' => 'contact'], function () {
    Route::get('/contact-us', [ContactPagesController::class, 'index'])->name('index');
});
Route::group(['as' => 'article.', 'prefix' => 'article'], function () {
    Route::get('/single', [ArticlesController::class, 'single'])->name('single');
});



