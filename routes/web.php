<?php

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

use App\SanPham;
use App\ProductType;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('admincp.index1');
});

Route::get('admin/dangnhap', 'DangnhapController@getDangnhapAdmin');
Route::post('admin/dangnhap', 'DangnhapController@postDangnhapAdmin')->name('postDangnhap');
Route::get('admin/logout', 'DangnhapController@logout')->name('logout');

Route::prefix('admincp')->group(function () {
    Route::get('/', 'Auth\admin\AdminController@index')->name('admin.index')->middleware('adminLogin');

    Route::resource('product', 'ProductController');

    Route::resource('sanpham', 'SanPhamController')->middleware('adminLogin');
    Route::post('timkiem', 'SanPhamController@timkiem')->name('sanpham.timkiem');

    Route::resource('loaisanpham', 'LoaiSanPhamController')->middleware('adminLogin');
    Route::post('show', 'LoaiSanPhamController@timkiem')->name('loaisanpham.timkiem');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
});

Route::resource('hocsinh', 'HocSinhController');


Route::resource('posts', 'PostsController');
Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'PostsController@changeStatus'));





