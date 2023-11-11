<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DataTinController;
use App\Http\Controllers\NguoidungController;
use App\Http\Controllers\ScrapeController;
use App\Models\TinTuc;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', 'NewsController@index');
// Route::get('/rss', 'NewsController@rssFeed');
Route::get('/',function(){
    return view('User.login');
});

Route::get('/duyettin', function () {
    return view('qltintuc.duyettin');
});
Route::get('/duyetnguon',[
    DataTinController::class,'DataNguon'
]);

Route::post('/duyetnguon',[
    DataTinController::class,'insertNguon'
]);

Route::post('/qltintuc',[
    DataTinController::class,'insertTin'
]);



Route::get('/tintuc',[
    DataTinController::class,'DataNguonTinTheLoai'
]);

Route::get('/chitiettin',function(){
    return view('qltintuc.chitiettin');
});

Route::get('/xoa',[
    DataTinController::class,'xoa'
]);



//Route::get('/scrape-tuoitre', 'App\Http\Controllers\ScrapeController@scrapeArticle');
Route::get('/scrape-tuoitre',[
    ScrapeController::class,'scrapeArticle'
]);
Route::get('/danhmuc',[
    ScrapeController::class,'Danhmuc2'
]);
Route::get('/tintucdanhmuc',[
    ScrapeController::class,'TinDanhMuc'
]);
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/duyetnguon', function () {
//         return view('qltintuc.duyetnguon');
//     })->name('duyetnguon');
// });

// Route::get('/dashboard', function () {
//     // Route này chỉ có thể truy cập nếu người dùng đã đăng nhập
// })->middleware(['auth']);
Route::get('/duyettin',function(){
    return view('qltintuc.duyettin');
});
// Route::get('/login', 'NguoidungController@loginForm');

Route::post('/login',[
    NguoidungController::class,'login'
]);
