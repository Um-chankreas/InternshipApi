<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;
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
// Login 
Route::post('/auth/login',[AuthController::class,'login']);
// School Api
Route::post('/school/register',[SchoolController::class,'register']);
Route::get('school/rating',[SchoolController::class,'rating']);


// Jury API

Route::post('/jury/register',[JuryController::class,'register']);
Route::post('jury/score',[JuryController::class,'score']);
Route::get('jury/listStudentDefense',[JuryController::class,'listStudentDefense']);
Route::get('jury/listscore',[JuryController::class,'listscore']);



// Advisor API
Route::post('/advisor/register',[AdvisorController::class,'register']);
// student API
Route::post('/student/register',[StudentController::class,'register']);

// Schedule Defense
Route::post('school/create_schedule',[ScheduleController::class,'create']);
Route::get('school/showroom',[ScheduleController::class,'showroom']);
Route::get('school/list',[ScheduleController::class,'listCaditate']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/get_user',[AuthController::class,'get_user']);
    
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
