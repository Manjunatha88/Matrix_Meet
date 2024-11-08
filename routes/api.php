<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//institute part
Route::post('/addinstitute',[InstituteController::class,'addinstitute']);
Route::get('/showinstitute',[InstituteController::class,'showinstitute']);
Route::delete('/deleteinstitute/{id}',[InstituteController::class,'delete_institute']);

//faculty part
Route::post('/addfaculty',[InstituteController::class,'addfaculty']);
Route::get('/showfaculty',[InstituteController::class,'showfaculty']);
Route::delete('/deletefaculty/{id}',[FacultyController::class,'delete_faculty']);


//this for faculty
Route::get('/viewfaculty',[FacultyController::class,'viewfaculty']);
Route::post('/addfaculty',[FacultyController::class,'addfaculty']);

//ministry for schedule meeting
Route::get('/viewschedule',[AdminController::class,'viewschedule']);
Route::post('/schedulemeeting',[AdminController::class,'schedulemeeting']);
Route::get('/getmeeting',[AdminController::class,'getmeeting'])->name('getmeeting');


//this is for message
// Route::get('getMessages', [MessageController::class, 'getMessages']);
// Route::get('getMessage/{id}', [MessageController::class, 'getMessage']);
// Route::post('updateMessage/{id}', [MessageController::class, 'updateMessage']);
// Route::delete('deleteMessage/{id}', [MessageController::class, 'deleteMessage']);
Route::post('/addMessage', [NotificationController::class, 'sendnotification']);

Route::get('/meetinghistory',[ScheduleController::class,'meeting_history']);
