<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Models\Upload;

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

    $fetch=Upload::paginate(70);
    // dd($fetch);

    return view('welcome',compact('fetch'));
});

Route::resource('upload','App\Http\Controllers\UploadController');
