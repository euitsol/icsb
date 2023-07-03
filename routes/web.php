<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
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

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

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
Route::group(['as' => 'contact.', 'prefix' => 'contact'], function () {
    Route::get('/contact-us', [ContactPagesController::class, 'index'])->name('index');
});
Route::group(['as' => 'article.', 'prefix' => 'article'], function () {
    Route::get('/single', [ArticlesController::class, 'single'])->name('single');
});



