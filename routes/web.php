<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apicontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->to("/admin");
});

Route::get('/report-download/{from}/{to}/{reporttype}', [Apicontroller::class, 'reportdownload'])->name('report-download');

