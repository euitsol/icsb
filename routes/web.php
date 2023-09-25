<?php

use App\Http\Controllers\Backend\AjaxController;
use App\Http\Controllers\Backend\ActsController;
use App\Http\Controllers\Backend\AssinedOfficerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\SecretarialStandardsController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\NationalConnectionController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\WWCSController;
use App\Http\Controllers\Backend\NationalAwardController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ICSBProfileController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\SinglePagesController;
use App\Http\Controllers\Backend\CommitteeController;
use App\Http\Controllers\Backend\ConvocationController;
use App\Http\Controllers\Backend\CouncilController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\CsFirmsController;
use App\Http\Controllers\Backend\ExamFaqController;
use App\Http\Controllers\Backend\JobPlacementController;
use App\Http\Controllers\Backend\MediaRoomController;
use App\Http\Controllers\Backend\NoticeBoardController;
use App\Http\Controllers\Backend\PresidentController;
use App\Http\Controllers\Backend\RecentVideoController;
use App\Http\Controllers\Backend\SampleQuestionPaperController;
use App\Http\Controllers\Backend\SecAndCeoController;
use App\Http\Controllers\Backend\UserManagement\RoleController;
use App\Http\Controllers\Backend\UserManagement\PermissionController;
use App\Http\Controllers\Frontend\DefaultController as ViewDefaultController;
use App\Http\Controllers\Frontend\AboutPagesController;
use App\Http\Controllers\Frontend\AjaxController as FrontendAjaxController;
use App\Http\Controllers\Frontend\EventPagesController;
use App\Http\Controllers\Frontend\CouncilPagesController;
use App\Http\Controllers\Frontend\StudentsPagesController;
use App\Http\Controllers\Frontend\MembersPagesController;
use App\Http\Controllers\Frontend\RulesAndRegulationsPagesController;
use App\Http\Controllers\Frontend\PublicationsPagesController;
use App\Http\Controllers\Frontend\ContactPagesController;
use App\Http\Controllers\Frontend\ArticlesController;
use App\Http\Controllers\Frontend\EmployeePagesController;
use App\Http\Controllers\Frontend\ExaminationPagesController;
use App\Http\Controllers\Frontend\FrontendSinglePagesController;
use App\Http\Controllers\Frontend\MediaRoomPagesController;
use App\Http\Controllers\Frontend\NoticeBoardPageController;
use App\Http\Controllers\Frontend\PublicationPagesController;
use App\Http\Controllers\Frontend\RulesPagesController;
use App\Http\Controllers\Frontend\StudentPagesController;
use App\Http\Controllers\SettingsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RoutebssProvider and all of them will
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
    Route::get('json-image/single/delete/{model}/{id}/{key}/{column}', [DefaultController::class, 'jsonImageDelete'])->name('json_image.single.delete');
    Route::get('view-pdf/{filepath}', [ViewDefaultController::class, 'view_pdf'])->name('view.pdf');
    // Ajax Routes
    Route::get('members/{id}', [AjaxController::class, 'memberInfo'])->name('m.info');
    //ERP Memeber
    Route::post('member-sync', [MemberController::class, 'sync'])->name('sync');


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
            Route::get('list',          [PermissionController::class, 'index'])->name('permission_list');
            Route::get('create',        [PermissionController::class, 'create'])->name('permission_add');
            Route::post('store',        [PermissionController::class, 'store'])->name('permission_store');
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

    // BSS Routes
    Route::group(['as' => 'bss.', 'prefix' => 'bss'], function () {
        Route::get('index', [SecretarialStandardsController::class, 'index'])->name('bss_list');
        Route::get('create', [SecretarialStandardsController::class, 'create'])->name('bss_create');
        Route::post('create', [SecretarialStandardsController::class, 'store'])->name('bss_create');
        Route::get('edit/{id}',      [SecretarialStandardsController::class, 'edit'])->name('bss_edit');
        Route::put('edit/{id}',      [SecretarialStandardsController::class, 'update'])->name('bss_edit');
        Route::get('status/{id}',      [SecretarialStandardsController::class, 'status'])->name('status.bss_edit');
        Route::get('featured/{id}',      [SecretarialStandardsController::class, 'featured'])->name('featured.bss_edit');
        Route::get('delete/{id}', [SecretarialStandardsController::class, 'delete'])->name('bss_delete');
    });
    // Acts
    Route::group(['as' => 'acts.', 'prefix' => 'acts'], function () {
        Route::get('index', [ActsController::class, 'index'])->name('acts_list');
        Route::get('create', [ActsController::class, 'create'])->name('acts_create');
        Route::post('create', [ActsController::class, 'store'])->name('acts_create');
        Route::get('edit/{id}', [ActsController::class, 'edit'])->name('acts_edit');
        Route::get('single-file/delete/{id}/{key}',      [ActsController::class, 'singleFileDelete'])->name('single_file.delete.acts_edit');
        Route::put('edit/{id}', [ActsController::class, 'update'])->name('acts_edit');
        Route::get('status/{id}', [ActsController::class, 'status'])->name('status.acts_edit');
        Route::get('delete/{id}', [ActsController::class, 'delete'])->name('acts_delete');
    });
    // Sample Question Papers
    Route::group(['as' => 'sample_question_paper.', 'prefix' => 'sample-question-paper'], function () {
        Route::get('index', [SampleQuestionPaperController::class, 'index'])->name('sqp_list');
        Route::get('create', [SampleQuestionPaperController::class, 'create'])->name('sqp_create');
        Route::post('create', [SampleQuestionPaperController::class, 'store'])->name('sqp_create');
        Route::get('edit/{id}', [SampleQuestionPaperController::class, 'edit'])->name('sqp_edit');
        Route::get('single-file/delete/{id}/{key}',      [SampleQuestionPaperController::class, 'singleFileDelete'])->name('single_file.delete.sqp_edit');
        Route::put('edit/{id}', [SampleQuestionPaperController::class, 'update'])->name('sqp_edit');
        Route::get('status/{id}', [SampleQuestionPaperController::class, 'status'])->name('status.sqp_edit');
        Route::get('delete/{id}', [SampleQuestionPaperController::class, 'delete'])->name('sqp_delete');
    });
    // Contact Us Routes
    Route::group(['as' => 'contact.', 'prefix' => 'contact'], function () {
        Route::get('index', [ContactController::class, 'index'])->name('contact_create');
        Route::post('create/location', [ContactController::class, 'createLocation'])->name('location.contact_create');
        Route::post('create/social', [ContactController::class, 'createSocial'])->name('social.contact_create');
        Route::post('create/phone', [ContactController::class, 'createPhone'])->name('phone.contact_create');
        Route::post('create/email', [ContactController::class, 'createEmail'])->name('email.contact_create');
        Route::get('contact/file/delete/{id}',      [ContactController::class, 'singleFileDelete'])->name('file.delete.contact_create');

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

    // Assined Officer Routes
    Route::group(['as' => 'assined_officer.', 'prefix' => 'assined_officer'], function () {
        Route::get('index', [AssinedOfficerController::class, 'index'])->name('assined_officer_list');
        Route::get('create', [AssinedOfficerController::class, 'create'])->name('assined_officer_create');
        Route::post('create', [AssinedOfficerController::class, 'store'])->name('assined_officer_create');
        Route::get('edit/{id}',      [AssinedOfficerController::class, 'edit'])->name('assined_officer_edit');
        Route::put('edit/{id}',      [AssinedOfficerController::class, 'update'])->name('assined_officer_edit');
        Route::get('status/{id}',      [AssinedOfficerController::class, 'status'])->name('status.assined_officer_edit');
        Route::get('delete/{id}', [AssinedOfficerController::class, 'delete'])->name('assined_officer_delete');
    });

    // Event Routes
    Route::group(['as' => 'event.', 'prefix' => 'event'], function () {
        Route::get('index', [EventController::class, 'index'])->name('event_list');
        Route::get('create', [EventController::class, 'create'])->name('event_create');
        Route::post('create', [EventController::class, 'store'])->name('event_create');
        Route::get('edit/{id}',      [EventController::class, 'edit'])->name('event_edit');
        Route::put('edit/{id}',      [EventController::class, 'update'])->name('event_edit');
        Route::get('status/{id}',      [EventController::class, 'status'])->name('status.event_edit');
        Route::get('featured/{id}',      [EventController::class, 'featured'])->name('featured.event_edit');
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
    // Testimonial Routes
    Route::group(['as' => 'testimonial.', 'prefix' => 'testimonial'], function () {
        Route::get('index', [TestimonialController::class, 'index'])->name('testimonial_list');
        Route::get('create', [TestimonialController::class, 'create'])->name('testimonial_create');
        Route::post('create', [TestimonialController::class, 'store'])->name('testimonial_create');
        Route::get('edit/{id}',      [TestimonialController::class, 'edit'])->name('testimonial_edit');
        Route::put('edit/{id}',      [TestimonialController::class, 'update'])->name('testimonial_edit');
        Route::get('status/{id}',      [TestimonialController::class, 'status'])->name('status.testimonial_edit');
        Route::get('delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial_delete');
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
    // Convocation Routes
    Route::group(['as' => 'convocation.', 'prefix' => 'convocation'], function () {
        Route::get('index', [ConvocationController::class, 'index'])->name('convocation_list');
        Route::get('create', [ConvocationController::class, 'create'])->name('convocation_create');
        Route::post('create', [ConvocationController::class, 'store'])->name('convocation_create');
        Route::get('edit/{id}',      [ConvocationController::class, 'edit'])->name('convocation_edit');
        Route::put('edit/{id}',      [ConvocationController::class, 'update'])->name('convocation_edit');
        Route::get('status/{id}',      [ConvocationController::class, 'status'])->name('status.convocation_edit');
        Route::get('delete/{id}', [ConvocationController::class, 'delete'])->name('convocation_delete');
    });
    // Media Room Routes
    Route::group(['as' => 'media_room.', 'prefix' => 'media_room'], function () {
        Route::get('index', [MediaRoomController::class, 'index'])->name('media_room_list');
        Route::get('create', [MediaRoomController::class, 'create'])->name('media_room_create');
        Route::post('create', [MediaRoomController::class, 'store'])->name('media_room_create');
        Route::get('edit/{id}',      [MediaRoomController::class, 'edit'])->name('media_room_edit');
        Route::put('edit/{id}',      [MediaRoomController::class, 'update'])->name('media_room_edit');
        Route::get('single-file/delete/{id}/{key}',      [MediaRoomController::class, 'singleFileDelete'])->name('single_file.delete.media_room_edit');
        Route::get('permission/accept/{id}',      [MediaRoomController::class, 'permissionAccept'])->name('permission.accept.media_room_edit');
        Route::get('permission/decline/{id}',      [MediaRoomController::class, 'permissionDecline'])->name('permission.decline.media_room_edit');
        Route::get('featured/{id}',      [MediaRoomController::class, 'featured'])->name('featured.media_room_edit');
        Route::get('delete/{id}', [MediaRoomController::class, 'delete'])->name('media_room_delete');

        // Media Room Category
        Route::get('category/create', [MediaRoomController::class, 'cat_create'])->name('media_room_cat_create');
        Route::post('category/create', [MediaRoomController::class, 'cat_store'])->name('media_room_cat_create');
        Route::get('category/edit/{id}', [MediaRoomController::class, 'cat_edit'])->name('media_room_cat_edit');
        Route::put('category/edit/{id}', [MediaRoomController::class, 'cat_update'])->name('media_room_cat_edit');
        Route::get('category/status/{id}', [MediaRoomController::class, 'cat_status'])->name('status.media_room_cat_edit');
        Route::get('category/delete/{id}', [MediaRoomController::class, 'cat_delete'])->name('media_room_cat_delete');
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
        Route::get('create/{type?}', [MemberController::class, 'create'])->name('member_create');
        Route::post('create/{type?}', [MemberController::class, 'store'])->name('member_create');
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
    // Member Module
    Route::group(['as' => 'committee.', 'prefix' => 'committee'], function () {
        Route::get('index', [CommitteeController::class, 'index'])->name('committee_list');

        Route::get('create', [CommitteeController::class, 'create'])->name('committee_create');
        Route::post('create', [CommitteeController::class, 'store'])->name('committee_create');
        Route::get('edit/{id}', [CommitteeController::class, 'edit'])->name('committee_edit');
        Route::put('edit/{id}', [CommitteeController::class, 'update'])->name('committee_edit');
        Route::get('status/{id}', [CommitteeController::class, 'status'])->name('status.committee_edit');
        Route::get('delete/{id}', [CommitteeController::class, 'delete'])->name('committee_delete');

        Route::get('committee-type/create', [CommitteeController::class, 'ct_create'])->name('committee_type_create');
        Route::post('committee-type/create', [CommitteeController::class, 'ct_store'])->name('committee_type_create');
        Route::get('committee-type/edit/{id}', [CommitteeController::class, 'ct_edit'])->name('committee_type_edit');
        Route::put('committee-type/edit/{id}', [CommitteeController::class, 'ct_update'])->name('committee_type_edit');
        Route::get('committee-type/status/{id}', [CommitteeController::class, 'ct_status'])->name('status.committee_type_edit');
        Route::get('committee-type/delete/{id}', [CommitteeController::class, 'ct_delete'])->name('committee_type_delete');

        Route::get('committee-member-type/create', [CommitteeController::class, 'cmt_create'])->name('cm_type_create');
        Route::post('committee-member-type/create', [CommitteeController::class, 'cmt_store'])->name('cm_type_create');
        Route::get('committee-member-type/edit/{id}', [CommitteeController::class, 'cmt_edit'])->name('cm_type_edit');
        Route::put('committee-member-type/edit/{id}', [CommitteeController::class, 'cmt_update'])->name('cm_type_edit');
        Route::get('committee-member-type/status/{id}', [CommitteeController::class, 'cmt_status'])->name('status.cm_type_edit');
        Route::get('committee-member-type/delete/{id}', [CommitteeController::class, 'cmt_delete'])->name('cm_type_delete');

        Route::get('committee-member/index/{id}', [CommitteeController::class, 'cm_index'])->name('committee_member_list');
        Route::get('committee-member/create/{id}', [CommitteeController::class, 'cm_create'])->name('committee_member_create');
        Route::post('committee-member/create/{id}', [CommitteeController::class, 'cm_store'])->name('committee_member_create');
        Route::get('committee-member/edit/{id}', [CommitteeController::class, 'cm_edit'])->name('committee_member_edit');
        Route::put('committee-member/edit/{id}', [CommitteeController::class, 'cm_update'])->name('committee_member_edit');
        Route::get('committee-member/status/{id}', [CommitteeController::class, 'cm_status'])->name('status.committee_member_edit');
        Route::get('committee-member/delete/{id}', [CommitteeController::class, 'cm_delete'])->name('committee_member_delete');

    });


    // Notice Board
    Route::group(['as' => 'notice_board.', 'prefix' => 'notice-board'], function () {
        Route::get('index', [NoticeBoardController::class, 'index'])->name('notice_list');

        Route::get('create', [NoticeBoardController::class, 'create'])->name('notice_create');
        Route::post('create', [NoticeBoardController::class, 'store'])->name('notice_create');
        Route::get('edit/{id}', [NoticeBoardController::class, 'edit'])->name('notice_edit');
        Route::get('single-file/delete/{id}/{key}',      [NoticeBoardController::class, 'singleFileDelete'])->name('single_file.delete.notice_edit');
        Route::put('edit/{id}', [NoticeBoardController::class, 'update'])->name('notice_edit');
        Route::get('status/{id}', [NoticeBoardController::class, 'status'])->name('status.notice_edit');
        Route::get('delete/{id}', [NoticeBoardController::class, 'delete'])->name('notice_delete');

        Route::get('committee-type/create', [NoticeBoardController::class, 'nc_create'])->name('notice_cat_create');
        Route::post('committee-type/create', [NoticeBoardController::class, 'nc_store'])->name('notice_cat_create');
        Route::get('committee-type/edit/{id}', [NoticeBoardController::class, 'nc_edit'])->name('notice_cat_edit');
        Route::put('committee-type/edit/{id}', [NoticeBoardController::class, 'nc_update'])->name('notice_cat_edit');
        Route::get('committee-type/status/{id}', [NoticeBoardController::class, 'nc_status'])->name('status.notice_cat_edit');
        Route::get('committee-type/delete/{id}', [NoticeBoardController::class, 'nc_delete'])->name('notice_cat_delete');

        Route::get('student-notice', [NoticeBoardController::class, 'studentNotice'])->name('student_notice_list');
        Route::get('member-notice', [NoticeBoardController::class, 'memberNotice'])->name('member_notice_list');

    });




    // Council Routes
    Route::group(['as' => 'council.', 'prefix' => 'council'], function () {
        Route::get('index', [CouncilController::class, 'index'])->name('council_list');

        Route::get('create', [CouncilController::class, 'create'])->name('council_create');
        Route::post('create', [CouncilController::class, 'store'])->name('council_create');
        Route::get('edit/{id}', [CouncilController::class, 'edit'])->name('council_edit');
        Route::put('edit/{id}', [CouncilController::class, 'update'])->name('council_edit');
        Route::get('status/{id}', [CouncilController::class, 'status'])->name('status.council_edit');
        Route::get('delete/{id}', [CouncilController::class, 'delete'])->name('council_delete');

        Route::get('council-member-type/create', [CouncilController::class, 'cmt_create'])->name('cm_type_create');
        Route::post('council-member-type/create', [CouncilController::class, 'cmt_store'])->name('cm_type_create');
        Route::get('council-member-type/edit/{id}', [CouncilController::class, 'cmt_edit'])->name('cm_type_edit');
        Route::put('council-member-type/edit/{id}', [CouncilController::class, 'cmt_update'])->name('cm_type_edit');
        Route::get('council-member-type/status/{id}', [CouncilController::class, 'cmt_status'])->name('status.cm_type_edit');
        Route::get('council-member-type/delete/{id}', [CouncilController::class, 'cmt_delete'])->name('cm_type_delete');

        Route::get('council-member/index/{id}', [CouncilController::class, 'cm_index'])->name('council_member_list');
        Route::get('council-member/create/{id}', [CouncilController::class, 'cm_create'])->name('council_member_create');
        Route::post('council-member/create/{id}', [CouncilController::class, 'cm_store'])->name('council_member_create');
        Route::get('council-member/edit/{id}', [CouncilController::class, 'cm_edit'])->name('council_member_edit');
        Route::put('council-member/edit/{id}', [CouncilController::class, 'cm_update'])->name('council_member_edit');
        Route::get('council-member/status/{id}', [CouncilController::class, 'cm_status'])->name('status.council_member_edit');
        Route::get('council-member/delete/{id}', [CouncilController::class, 'cm_delete'])->name('council_member_delete');

    });
    // ICSB Profile
    // Route::group(['as' => 'icsb_profile.', 'prefix' => 'icsb-profile'], function () {
    //     Route::get('create', [ICSBProfileController::class, 'index'])->name('icsb_profile_create');
    //     Route::post('create', [ICSBProfileController::class, 'store'])->name('icsb_profile_create');
    // });
    // President Module
    Route::group(['as' => 'president.', 'prefix' => 'president'], function () {
        Route::get('index', [PresidentController::class, 'index'])->name('president_list');
        Route::get('create', [PresidentController::class, 'create'])->name('president_create');
        Route::post('create', [PresidentController::class, 'store'])->name('president_create');
        Route::get('edit/{id}', [PresidentController::class, 'edit'])->name('president_edit');
        Route::put('edit/{id}', [PresidentController::class, 'update'])->name('president_edit');
        Route::get('single/delete/{id}', [PresidentController::class, 'singleDelete'])->name('single.president_delete');
        Route::get('delete/{id}', [PresidentController::class, 'delete'])->name('president_delete');
    });
    Route::group(['as' => 'sec_and_ceo.', 'prefix' => 'secretary-and-ceo'], function () {
        Route::get('index', [SecAndCeoController::class, 'index'])->name('sc_list');
        Route::get('create', [SecAndCeoController::class, 'create'])->name('sc_create');
        Route::post('create', [SecAndCeoController::class, 'store'])->name('sc_create');
        Route::get('edit/{id}', [SecAndCeoController::class, 'edit'])->name('sc_edit');
        Route::put('edit/{id}', [SecAndCeoController::class, 'update'])->name('sc_edit');
        Route::get('single/delete/{id}', [SecAndCeoController::class, 'singleDelete'])->name('single.sc_delete');
        Route::get('delete/{id}', [SecAndCeoController::class, 'delete'])->name('sc_delete');
    });
    Route::group(['as' => 'job_placement.', 'prefix' => 'job-placement'], function () {
        Route::get('index', [JobPlacementController::class, 'index'])->name('jp_list');
        Route::get('create', [JobPlacementController::class, 'create'])->name('jp_create');
        Route::post('create', [JobPlacementController::class, 'store'])->name('jp_create');
        Route::get('edit/{id}', [JobPlacementController::class, 'edit'])->name('jp_edit');
        Route::put('edit/{id}', [JobPlacementController::class, 'update'])->name('jp_edit');
        Route::get('status/{id}', [JobPlacementController::class, 'status'])->name('status.jp_edit');
        Route::get('delete/{id}', [JobPlacementController::class, 'delete'])->name('jp_delete');
    });
    Route::group(['as' => 'cs_firm.', 'prefix' => 'cs-firms'], function () {
        Route::get('index', [CsFirmsController::class, 'index'])->name('cs_firm_list');
        Route::get('create', [CsFirmsController::class, 'create'])->name('cs_firm_create');
        Route::post('create', [CsFirmsController::class, 'store'])->name('cs_firm_create');
        Route::get('edit/{id}', [CsFirmsController::class, 'edit'])->name('cs_firm_edit');
        Route::put('edit/{id}', [CsFirmsController::class, 'update'])->name('cs_firm_edit');
        Route::get('status/{id}', [CsFirmsController::class, 'status'])->name('status.cs_firm_edit');
        Route::get('delete/{id}', [CsFirmsController::class, 'delete'])->name('cs_firm_delete');
    });
    Route::group(['as' => 'recent_video.', 'prefix' => 'recent-video'], function () {
        Route::get('index', [RecentVideoController::class, 'index'])->name('recent_video_list');
        Route::get('create', [RecentVideoController::class, 'create'])->name('recent_video_create');
        Route::post('create', [RecentVideoController::class, 'store'])->name('recent_video_create');
        Route::get('edit/{id}', [RecentVideoController::class, 'edit'])->name('recent_video_edit');
        Route::put('edit/{id}', [RecentVideoController::class, 'update'])->name('recent_video_edit');
        Route::get('status/{id}', [RecentVideoController::class, 'status'])->name('status.recent_video_edit');
        Route::get('delete/{id}', [RecentVideoController::class, 'delete'])->name('recent_video_delete');
    });
    // FAQ Routes
    Route::group(['as' => 'exam_faq.', 'prefix' => 'exam-faqs'], function () {
        Route::get('index', [ExamFaqController::class, 'index'])->name('exam_faq_list');
        Route::get('create', [ExamFaqController::class, 'create'])->name('exam_faq_create');
        Route::post('create', [ExamFaqController::class, 'store'])->name('exam_faq_create');
        Route::get('edit/{id}',      [ExamFaqController::class, 'edit'])->name('exam_faq_edit');
        Route::put('edit/{id}',      [ExamFaqController::class, 'update'])->name('exam_faq_edit');
        Route::get('delete/{id}', [ExamFaqController::class, 'delete'])->name('exam_faq_delete');
    });


});


//Developer Routes
//This will export the permissions as csv for seeders
Route::get('/export-permissions', function () {
    $filename = 'permissions.csv';
    $filePath = createCSV($filename);

    return Response::download($filePath, $filename);
})->name('export.permissions');
Route::get('/single-page/create', [SinglePagesController::class, 'create'])->name('sp.create');
Route::post('/single-page/store', [SinglePagesController::class, 'store'])->name('sp.store');


Route::get('/single-page/show/{page_slug}', [SinglePagesController::class, 'show'])->name('sp.show');
Route::post('/single-page/store/{page_slug}', [SinglePagesController::class, 'form_store'])->name('sp.form.store');

Route::post('/single-page/file-upload', [SinglePagesController::class, 'file_upload'])->name('sp.file.upload');
Route::get('/single-page/file-download/{url}', [SinglePagesController::class, 'view_or_download'])->name('sp.file.download');
Route::get('/single-page/file-delete/{id?}/{key?}/{url?}', [SinglePagesController::class, 'delete'])->name('sp.file.delete');



//Frontend Routes

Route::get('/', [HomePageController::class, 'index'])->name('home');
// Default View File Download Route
Route::get('front/download/{filename}', [ViewDefaultController::class, 'view_download'])->name('view.download');

// Ajax
Route::get('home/notice/{cat_id}', [FrontendAjaxController::class, 'noticeHome'])->name('home.notice');
Route::get('national-award/data/{offset}', [FrontendAjaxController::class, 'awards'])->name('awards');
Route::get('convocations/data/{offset}', [FrontendAjaxController::class, 'convocations'])->name('convocations');
Route::get('cs-firms-members/search/{search_value}', [FrontendAjaxController::class, 'cs_firms_member_search'])->name('cs_firms.member_info.search');
Route::get('members/search/{search_value}/{cat_id}', [FrontendAjaxController::class, 'member_search'])->name('member_info.search');
Route::get('corporate-leader/search/{search_value}', [FrontendAjaxController::class, 'corporate_leader'])->name('corporate_leader.search');
Route::get('single_page/see_more/{slug}', [FrontendAjaxController::class, 'singlePageSeeMore'])->name('single_page.see_more');
Route::get('media-data/{id}/{offset}', [FrontendAjaxController::class, 'mediaRooms'])->name('media_rooms');

// Single Pages Route
Route::get('/page/{frontend_slug}', [FrontendSinglePagesController::class, 'frontend'])->name('sp.frontend');

Route::group(['as' => 'about.', 'prefix' => 'about'], function () {
    // Route::get('/icsb-profile', [AboutPagesController::class, 'icsb_profile'])->name('icsb_profile');
    Route::get('/faq', [AboutPagesController::class, 'faq'])->name('faq');
    Route::get('/world-wide-cs', [AboutPagesController::class, 'wwcs'])->name('wwcs');
});
Route::group(['as' => 'council_view.', 'prefix' => 'council'], function () {
    Route::get('/members/{slug}', [CouncilPagesController::class, 'council_m'])->name('council.members');
    Route::get('/{slug}/members', [CouncilPagesController::class, 'committee'])->name('committee.members');
    Route::get('/president', [CouncilPagesController::class, 'president'])->name('president');
    Route::get('/president/message', [CouncilPagesController::class, 'presidentM'])->name('president.message');
    Route::get('/past-presidents', [CouncilPagesController::class, 'pastPresidents'])->name('past_presidents');
    Route::get('/past-president/{slug}', [CouncilPagesController::class, 'singlePP'])->name('single.pp');
});
Route::group(['as' => 'employee_view.', 'prefix' => 'employee'], function () {
    Route::get('/secretary-and-ceo', [EmployeePagesController::class, 'sec_and_ceo'])->name('sec_and_ceo');
    Route::get('/organogram', [EmployeePagesController::class, 'organogram'])->name('organogram');
    Route::get('/assined-officers', [EmployeePagesController::class, 'assinedOfficer'])->name('assined_officer');
    // Route::get('/past-secretary-and-ceos', [EmployeePagesController::class, 'past_sec_and_ceos'])->name('past_sec_and_ceos');
    // Route::get('/past-secretary-and-ceo/{slug}', [EmployeePagesController::class, 'singlePSC'])->name('single.psc');
});
Route::group(['as' => 'examination.', 'prefix' => 'examination'], function () {
    Route::get('/exam-faq', [ExaminationPagesController::class, 'exam_faq'])->name('exam_faq');
    Route::get('/sample-question-papers', [ExaminationPagesController::class, 'sampleQP'])->name('sqp');
    Route::get('/sample-question-paper/{slug}', [ExaminationPagesController::class, 'sampleQPView'])->name('sqp_view');
    // Route::get('/exam-schedule', [ExaminationPagesController::class, 'examSchedule'])->name('exam_schedule');
});
Route::group(['as' => 'publication_view.', 'prefix' => 'publication'], function () {
    Route::get('/icsb-national-award-souvenir', [PublicationPagesController::class, 'nationalAward'])->name('national_award');
    Route::get('/icsb-convocation-souvenir', [PublicationPagesController::class, 'convocation'])->name('convocation');
    // Route::get('/exam-schedule', [ExaminationPagesController::class, 'examSchedule'])->name('exam_schedule');
});
Route::group(['as' => 'event_view.', 'prefix' => 'event'], function () {
    Route::get('/all-events', [EventPagesController::class, 'events'])->name('all');
    Route::get('/view/{slug}', [EventPagesController::class, 'view'])->name('view');
});
Route::group(['as' => 'media_room_view.', 'prefix' => 'media-room'], function () {
    Route::get('/all', [MediaRoomPagesController::class, 'mr_all'])->name('all');
    Route::get('/{slug}', [MediaRoomPagesController::class, 'cat_all'])->name('cat.all');
    Route::get('/view/{slug}', [MediaRoomPagesController::class, 'view'])->name('view');
});
Route::group(['as' => 'rules_view.', 'prefix' => 'rules'], function () {
    Route::get('/secretarial-standards/{slug}', [RulesPagesController::class, 'bss_view'])->name('bss.view');
    Route::get('act/{slug}', [RulesPagesController::class, 'view_act'])->name('act.view');
});

// Route::group(['as' => 'students.', 'prefix' => 'students'], function () {
//     Route::get('/world-wide-chartered-secretaries', [StudentsPagesController::class, 'wwcs'])->name('wwcs');
// });
Route::group(['as' => 'member_view.', 'prefix' => 'member'], function () {
    Route::get('/member-search/{slug}', [MembersPagesController::class, 'memberSearch'])->name('m_search');
    Route::get('/job-placements', [MembersPagesController::class, 'job_placement'])->name('jps');
    Route::get('/cs-firms', [MembersPagesController::class, 'cs_firm'])->name('cs_firm');
    Route::get('/members-lounge', [MembersPagesController::class, 'members_lounge'])->name('members_lounge');
    Route::get('/corporate-leader/search', [MembersPagesController::class, 'corporate_leader'])->name('corporate_leader');
});
Route::group(['as' => 'student_view.', 'prefix' => 'student'], function () {
    Route::get('/cs-hand-book', [StudentPagesController::class, 'csHandBook'])->name('cs_hand_book');
    Route::get('/icsb-library', [StudentPagesController::class, 'library'])->name('library');
});
Route::group(['as' => 'notice_view.', 'prefix' => 'notices'], function () {
    Route::get('/{slug?}', [NoticeBoardPageController::class, 'notice'])->name('notice');
});
// Route::group(['as' => 'rules_and_regulations.', 'prefix' => 'rulse-&-regulations'], function () {
//     Route::get('/the-chartered-secretaries-act-2010', [RulesAndRegulationsPagesController::class, 'tcsa'])->name('tcsa');
// });
// Route::group(['as' => 'publications.', 'prefix' => 'publications'], function () {
//     Route::get('/photo-gallery', [PublicationsPagesController::class, 'photoGallery'])->name('photo_gallery');
// });
Route::group(['as' => 'contact_us.', 'prefix' => 'contact-us'], function () {
    Route::get('/feedback', [ContactPagesController::class, 'feedback'])->name('feedback');
    Route::get('/address', [ContactPagesController::class, 'address'])->name('address');
    Route::get('/social-platforms', [ContactPagesController::class, 'socialPlatform'])->name('social_platforms');
    Route::get('/lcoation-map', [ContactPagesController::class, 'locationMap'])->name('location_map');
});
// Route::group(['as' => 'article.', 'prefix' => 'article'], function () {
//     Route::get('/single', [ArticlesController::class, 'single'])->name('single');
// });



