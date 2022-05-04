<?php

use App\Http\Controllers\DangNhapAdminController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\DanhMucController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListCartController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThongkeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/quantri/login', [DangNhapAdminController::class, 'index']);
Route::post('/quantri/login', [DangNhapAdminController::class, 'checkin']);
Route::get('/quantri/logout', [DangNhapAdminController::class, 'logout']);
//quản trị admin
Route::group(['prefix' => 'quantri', 'middleware' => 'phanquyen'], function () {
    Route::get('/', [ThongkeController::class, "index"]);
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return redirect('quantri/')->with('success','xóa cache thành công');
    });
    Route::resource('danhmuc', DanhMucController::class);
    Route::resource('sanpham', SanPhamController::class);

    Route::get('/unactive-product/{id}', [SanPhamController::class, 'unactive_product']);
    Route::get('/active-product/{id}', [SanPhamController::class, 'active_product']);

    Route::get('dropzone', [DropzoneController::class, 'index']);
    Route::post('dropzone/upload', [DropzoneController::class, 'upload'])->name('dropzone.upload');
    Route::get('dropzone/fetch', [DropzoneController::class, 'fetch'])->name('dropzone.fetch');
    Route::get('dropzone/delete', [DropzoneController::class, 'delete'])->name('dropzone.delete');

});
//user
Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/sanpham', [SanPhamController::class, 'index']);
    Route::get('/san-pham/{slug}', [HomeController::class, 'sanphamdetail']);
    Route::get('/addCart/{id}', [SanPhamController::class, 'cart']);
    Route::get('/DeleteCart/{id}', [SanPhamController::class, 'DeleteCart']);
    Route::get('/ListCart', [ListCartController::class, 'index']);
    Route::get('/DeleteListCart/{id}', [ListCartController::class, 'DeleteListCart']);
    Route::get('/UpdateListCart/{id}/{quanty}', [ListCartController::class, 'UpdateListCart']);
    // Route::post('Save-all', [ListCartController::class, 'Saveall']);

});
