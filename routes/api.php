<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apicontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register-user', [Apicontroller::class,'regsiteruser']);

Route::post('/update-user', [Apicontroller::class,'updateuser']);

Route::post('/auth-login', [Apicontroller::class,'loginuser']);

Route::get('/all-user', [Apicontroller::class,'users']);

Route::get('/all-records/{userid}', [Apicontroller::class,'allrecords']);

Route::post('/add-support', [Apicontroller::class,'addsupports']);

Route::post('/add-support-appointment', [Apicontroller::class,'addsupportappointment']);

Route::post('/send-health-care-report', [Apicontroller::class,'sendhealthcarereport']);

Route::get('/health-report/{userid}/{healthid}', [Apicontroller::class,'healthcarereport'])
->name('healthcarereport');

Route::post('/update-support', [Apicontroller::class,'updatesupports']);

Route::get('/all-supports/{userid}', [Apicontroller::class,'allsupports']);

Route::get('/support-info/{id}', [Apicontroller::class,'supportinfo']);

Route::get('/support-appointments/{id}', [Apicontroller::class,'supportappinfo']);

Route::get('/support-delete/{id}', [Apicontroller::class,'supportdelete']);

Route::post('/add-medication', [Apicontroller::class,'addmedication']);

Route::post('/add-measurement', [Apicontroller::class,'addmeasurement']);
Route::post('/add-activity', [Apicontroller::class,'addactivity']);
Route::post('/add-symptoms', [Apicontroller::class,'addsymptoms']);




Route::get('/all-medication/{userid}', [Apicontroller::class,'allmedication']);

Route::get('/all-measurement/{userid}', [Apicontroller::class,'allmeasurement']);

Route::get('/all-lab/{userid}', [Apicontroller::class,'alllab']);

Route::get('/all-activity/{userid}', [Apicontroller::class,'allactivity']);

Route::get('/all-symptoms/{userid}', [Apicontroller::class,'allsymptoms']);

Route::get('/delete-record/{id}/{type}', [Apicontroller::class,'delmedication']);

Route::get('/health-report/{userid}/{doctorid}', [Apicontroller::class,'sendreport']);

