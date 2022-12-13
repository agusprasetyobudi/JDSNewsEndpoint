<?php

use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('call-migration',function(){
    try {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        Artisan::call('passport:install --force');
        return response("Migrate Success",200);
    } catch (\Throwable $th) {
        throw $th;
    }


});
