<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('roxtone.admin.users-table');
});

Route::get('/', function () {
    return view('home');
});


// Route::prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'get_admin']);

//     Route::get('/edit/{id}', [AdminController::class, 'get_admin']);

//     Route::get('/delete/{id}', [AdminController::class, 'get_admin']);
// })->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/', [AdminController::class, 'get_admin']);

    Route::get('/update/{id}', [AdminController::class, 'get_update_customer']);

    Route::get('/delete/{id}', [AdminController::class, 'delete_customer']);

    Route::post('/update/{id}', [AdminController::class, 'post_update_customer']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
