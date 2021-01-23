<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileHostingController;
use App\Http\Controllers\ShortLinkController;

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
    return view('landing');
});

Route::get('/dl/{code}', [FileHostingController::class, 'downloadFile']);
Route::get('/dl/{code}/{key}', [FileHostingController::class, 'downloadSecuredFile']);
Route::get('/dld/{code}', [FileHostingController::class, 'downloadedFile']);

Route::get('/rm/{code}', function () {
    return view('remove');
});



Route::get('/test', [ShortLinkController::class, 'test']);
Route::get('/l/{code}', [ShortLinkController::class, 'navigatelink']);
Route::post('/generatelink', [ShortLinkController::class, 'generatelink']);
Route::post('/uploadfile', [FileHostingController::class, 'uploadfile']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
