<?php

use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\BrandType\BrandTypeController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Size\SizeController;
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
        Route::get('create', [BrandController::class, 'create'])->name('admin.brand.create');
    });

    Route::prefix('brand-type')->group(function (){
        Route::get('index', [BrandTypeController::class, 'index'])->name('admin.brand-type.index');
        Route::get('create', [BrandTypeController::class, 'create'])->name('admin.brand-type.create');
    });

    Route::prefix('size')->group(function (){
        Route::get('index', [SizeController::class, 'index'])->name('admin.size.index');
        Route::get('create', [SizeController::class, 'create'])->name('admin.size.create');
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
