<?php

use App\Http\Controllers\Admin\User\UserController;
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
Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('pages.admin.dashboard.dashboard');
    });
    Route::prefix('users')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
    });
});


Route::get('/', function () {
    return view('pages.frontend.dashboard.dashboard');
});
Route::get('/notification', function () {
    return view('pages.frontend.notification.index');
});
Route::get('/stok', function () {
    return view('pages.frontend.stock.index');
});
Route::get('/stok/inner', function () {
    return view('pages.frontend.stock.inner.index');
});
Route::get('/stok/inner/create', function () {
    return view('pages.frontend.stock.inner.create');
});
Route::get('/stok/master', function () {
    return view('pages.frontend.stock.master.index');
});
Route::get('/stok/master/create', function () {
    return view('pages.frontend.stock.master.create');
});
Route::get('/stok/plastic', function () {
    return view('pages.frontend.stock.plastic.index');
});
Route::get('/stok/plastic/create', function () {
    return view('pages.frontend.stock.plastic.create');
});
Route::get('/briquette/finished', function () {
    return view('pages.frontend.briquette.finished.index');
});
Route::get('/briquette/finished/create', function () {
    return view('pages.frontend.briquette.finished.create');
});
Route::get('/briquette/semi-finished', function () {
    return view('pages.frontend.briquette.semi-finished.index');
});
Route::get('/briquette/semi-finished/create', function () {
    return view('pages.frontend.briquette.semi-finished.create');
});
Route::get('/profile', function () {
    return view('pages.frontend.profile.profile');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
