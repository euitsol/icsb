<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserManagement\RoleController;
use App\Http\Controllers\Backend\UserManagement\PermissionController;

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
});


//Developer Routes
//This will export the permissions as csv for seeders
Route::get('/export-permissions', function () {
    $filename = 'permissions.csv';
    $filePath = createCSV($filename);

    return Response::download($filePath, $filename);
})->name('export.permissions');


