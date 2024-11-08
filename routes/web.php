<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NotificationController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[IndexController::class,'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/home',[LoginController::class,'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//this for institute
Route::get('/viewinstitute',[InstituteController::class,'viewinstitute']);
Route::post('/addinstitute',[InstituteController::class,'addinstitute']);
Route::get('/showinstitute', [InstituteController::class, 'showinstitute'])->name('institute_list');//admin site visible institute details
Route::delete('/deleteinstitute/{id}',[InstituteController::class,'delete_institute']);


//this for faculty
Route::get('/viewfaculty',[FacultyController::class,'viewfaculty']);
Route::post('/addfaculty',[FacultyController::class,'addfaculty']);
Route::get('/showfaculty', [FacultyController::class, 'showfaculty'])->name('faculty_list');
Route::delete('/deletefaculty/{id}',[FacultyController::class,'delete_faculty']);


//admin side meeting part
Route::get('/meetingaction',[GoogleController::class,'meetingaction'])->name('meetingaction');
Route::get('/meetingindex',[GoogleController::class,'meetingindex'])->name('meetingindex');
Route::get('/meetinghistory',[ScheduleController::class,'meeting_history']);

//ministry for schedule meeting
Route::get('/viewschedule',[AdminController::class,'viewschedule']);
Route::post('/schedulemeeting',[AdminController::class,'schedulemeeting'])->name('addmeeting');
Route::get('/getmeeting', [AdminController::class, 'getmeeting'])->name('getmeeting');
Route::get('getinstitutions', [InstituteController::class, 'getInstitutions']);



//this is for message 
Route::get('viewMessage', [NotificationController::class, 'getMessages']);
Route::post('addMessage', [NotificationController::class, 'sendnotification']);
Route::get('getMessage/{id}', [MessageController::class, 'getMessage']);
Route::post('updateMessage/{id}', [MessageController::class, 'updateMessage']);
Route::delete('deleteMessage/{id}', [MessageController::class, 'deleteMessage']);



Route::get('/notification',[NotificationController::class,'notification']);


