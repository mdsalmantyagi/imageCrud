<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageUploadController;
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
Route::get('/reset', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    echo " Cache Cleared";
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/image-upload', [imageUploadController::class, 'imageUpload'])->name('image.upload');
Route::post('/image-upload', [imageUploadController::class, 'imageUploadPost'])->name('image.upload.post');