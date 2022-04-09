<?php

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
    return view('pages.dashboard.dashboard');
});
Route::get('/notification', function () {
    return view('pages.notification.index');
});
Route::get('/stok', function () {
    return view('pages.stock.index');
});
Route::get('/stok/inner', function () {
    return view('pages.stock.inner.index');
});
Route::get('/stok/inner/create', function () {
    return view('pages.stock.inner.create');
});
Route::get('/stok/master', function () {
    return view('pages.stock.master.index');
});
Route::get('/stok/master/create', function () {
    return view('pages.stock.master.create');
});
Route::get('/stok/plastic', function () {
    return view('pages.stock.plastic.index');
});
Route::get('/stok/plastic/create', function () {
    return view('pages.stock.plastic.create');
});
Route::get('/briquette/finished', function () {
    return view('pages.briquette.finished.index');
});
Route::get('/briquette/finished/create', function () {
    return view('pages.briquette.finished.create');
});
Route::get('/briquette/semi-finished', function () {
    return view('pages.briquette.semi-finished.index');
});
Route::get('/briquette/semi-finished/create', function () {
    return view('pages.briquette.semi-finished.create');
});
Route::get('/profile', function () {
    return view('pages.profile.profile');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
