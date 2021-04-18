<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScheduleController;
use App\Models\Schedule;
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

Route::get('jury/listscore',[JuryController::class,'listscore']);
Route::get('/jury/listStudentDefense',[JuryController::class,'listStudentDefense']);


// Advisor API
Route::post('/advisor/register',[AdvisorController::class,'register']);
// student API
Route::post('/student/register',[StudentController::class,'register']);
Route::post('/student/create_project',[StudentController::class,'create_project']);
Route::get('/student/show_project',[StudentController::class,'show_project']);
Route::get('/student/get_student',[StudentController::class,'get_student']);

// Schedule Defense
Route::post('school/create_schedule',[ScheduleController::class,'create']);
Route::get('school/showroom',[ScheduleController::class,'showroom']);
Route::get('school/listcandidate',[ScheduleController::class,'listCaditate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return "Delete Token";
});
