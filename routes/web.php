<?php

use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\BrandType\BrandTypeController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Size\SizeController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Auth\Frontend\LoginFrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\Briquette\FinishedController;
use App\Http\Controllers\Frontend\Briquette\SemiFinishedController;
use App\Http\Controllers\Frontend\Dashboard\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\Notification\NotificationController;
use App\Http\Controllers\Frontend\Profile\ProfileController as FrontendProfileController;
use App\Http\Controllers\Frontend\Stock\InnerController;
use App\Http\Controllers\Frontend\Stock\MasterController;
use App\Http\Controllers\Frontend\Stock\PlasticController;
use App\Http\Controllers\Frontend\Stock\StockController;
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
Route::get('/login-frontend', [LoginFrontendController::class, 'showLoginForm'])->name('login.frontend');
Route::post('/login-frontend/submit', [LoginFrontendController::class, 'login'])->name('login.frontend.submit');
Route::get('/login-frontend/logout', [LoginFrontendController::class, 'logout'])->name('logout.frontend');

Route::group(['middleware' => 'auth', 'as' => 'frontend.'], function () {
    Route::get('/', [FrontendDashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');

    //Inner
    Route::get('/stock/inner', [InnerController::class, 'index'])->name('inner.index');
    Route::post('/stock/inner', [InnerController::class, 'datatables'])->name('inner.datatables');
    Route::get('/stock/inner/create', [InnerController::class, 'create'])->name('inner.create');
    Route::post('/stock/inner/create', [InnerController::class, 'store'])->name('inner.store');
    Route::get('/stock/inner/delete/{id}', [InnerController::class, 'destroy'])->name('inner.delete');

    //Master
    Route::get('/stock/master', [MasterController::class, 'index'])->name('master.index');
    Route::post('/stock/master', [MasterController::class, 'datatables'])->name('master.datatables');
    Route::get('/stock/master/create', [MasterController::class, 'create'])->name('master.create');
    Route::post('/stock/master/create', [MasterController::class, 'store'])->name('master.store');
    Route::get('/stock/master/delete/{id}', [MasterController::class, 'destroy'])->name('master.delete');

    //Plastic
    Route::get('/stock/plastic', [PlasticController::class, 'index'])->name('plastic.index');
    Route::post('/stock/plastic', [PlasticController::class, 'datatables'])->name('plastic.datatables');
    Route::get('/stock/plastic/create', [PlasticController::class, 'create'])->name('plastic.create');
    Route::post('/stock/plastic/create', [PlasticController::class, 'store'])->name('plastic.store');
    Route::get('/stock/plastic/delete/{id}', [PlasticController::class, 'destroy'])->name('plastic.delete');

    //Semi-Finished Briquette
    Route::get('/briquette/semi-finished', [SemiFinishedController::class, 'index'])->name('semi-finished.index');
    Route::get('/briquette/semi-finished/create', [SemiFinishedController::class, 'create'])->name('semi-finished.create');

    //Finished Briquette
    Route::get('/briquette/finished', [FinishedController::class, 'index'])->name('finished.index');
    Route::get('/briquette/finished/create', [FinishedController::class, 'create'])->name('finished.create');

    //Profile User
    Route::get('/profile', [FrontendProfileController::class, 'index'])->name('profile.index');
});

    Route::get('/login-admin', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login-submit', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/login-admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin'], 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::prefix('users')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('user.index');
        Route::post('index', [UserController::class, 'datatables'])->name('user.datatables');
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('create', [UserController::class, 'store'])->name('user.store');
        Route::get('{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('{id}', [UserController::class, 'destroy'])->name('user.delete');
    });

    Route::prefix('brand')->group(function (){
        Route::get('index', [BrandController::class, 'index'])->name('brand.index');
        Route::post('index', [BrandController::class, 'datatables'])->name('brand.datatables');
        Route::get('create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('create', [BrandController::class, 'store'])->name('brand.store');
        Route::get('{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::delete('{id}', [BrandController::class, 'destroy'])->name('brand.delete');
    });

    Route::prefix('brand-type')->group(function (){
        Route::get('index', [BrandTypeController::class, 'index'])->name('brand-type.index');
        Route::post('index', [BrandTypeController::class, 'datatables'])->name('brand-type.datatables');
        Route::get('create', [BrandTypeController::class, 'create'])->name('brand-type.create');
        Route::post('create', [BrandTypeController::class, 'store'])->name('brand-type.store');
        Route::get('{id}', [BrandTypeController::class, 'edit'])->name('brand-type.edit');
        Route::put('{id}', [BrandTypeController::class, 'update'])->name('brand-type.update');
        Route::delete('{id}', [BrandTypeController::class, 'destroy'])->name('brand-type.delete');
    });

    Route::prefix('size')->group(function (){
        Route::get('index', [SizeController::class, 'index'])->name('size.index');
        Route::post('index', [SizeController::class, 'datatables'])->name('size.datatables');
        Route::get('create', [SizeController::class, 'create'])->name('size.create');
        Route::post('create', [SizeController::class, 'store'])->name('size.store');
        Route::get('{id}', [SizeController::class, 'edit'])->name('size.edit');
        Route::put('{id}', [SizeController::class, 'update'])->name('size.update');
        Route::delete('{id}', [SizeController::class, 'destroy'])->name('size.delete');
    });

    Route::prefix('profile')->group(function (){
        Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('edit', [ProfileController::class, 'update'])->name('profile.update');
    });
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
