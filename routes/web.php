<?php

use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\BrandType\BrandTypeController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Size\SizeController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Auth\LoginController;
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
    Route::get('/login-admin', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login-submit', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/login-admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::prefix('users')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('admin.user.index');
        Route::post('index', [UserController::class, 'datatables'])->name('admin.user.datatables');
        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('create', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    });

    Route::prefix('brand')->group(function (){
        Route::get('index', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::post('index', [BrandController::class, 'datatables'])->name('admin.brand.datatables');
        Route::get('create', [BrandController::class, 'create'])->name('admin.brand.create');
        Route::post('create', [BrandController::class, 'store'])->name('admin.brand.store');
        Route::get('{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::put('{id}', [BrandController::class, 'update'])->name('admin.brand.update');
        Route::delete('{id}', [BrandController::class, 'destroy'])->name('admin.brand.delete');
    });

    Route::prefix('brand-type')->group(function (){
        Route::get('index', [BrandTypeController::class, 'index'])->name('admin.brand-type.index');
        Route::post('index', [BrandTypeController::class, 'datatables'])->name('admin.brand-type.datatables');
        Route::get('create', [BrandTypeController::class, 'create'])->name('admin.brand-type.create');
        Route::post('create', [BrandTypeController::class, 'store'])->name('admin.brand-type.store');
        Route::get('{id}', [BrandTypeController::class, 'edit'])->name('admin.brand-type.edit');
        Route::put('{id}', [BrandTypeController::class, 'update'])->name('admin.brand-type.update');
        Route::delete('{id}', [BrandTypeController::class, 'destroy'])->name('admin.brand-type.delete');
    });

    Route::prefix('size')->group(function (){
        Route::get('index', [SizeController::class, 'index'])->name('admin.size.index');
        Route::post('index', [SizeController::class, 'datatables'])->name('admin.size.datatables');
        Route::get('create', [SizeController::class, 'create'])->name('admin.size.create');
        Route::post('create', [SizeController::class, 'store'])->name('admin.size.store');
        Route::get('{id}', [SizeController::class, 'edit'])->name('admin.size.edit');
        Route::put('{id}', [SizeController::class, 'update'])->name('admin.size.update');
        Route::delete('{id}', [SizeController::class, 'destroy'])->name('admin.size.delete');
    });

    Route::prefix('profile')->group(function (){
        Route::get('edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
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
