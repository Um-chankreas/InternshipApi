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
Route::post('/auth/login', [AuthController::class, 'login']);
// School Api
Route::post('/school/register', [SchoolController::class, 'register']);
Route::get('school/rating', [SchoolController::class, 'rating']);


// Jury API

Route::post('/jury/register', [JuryController::class, 'register']);
Route::post('jury/score', [JuryController::class, 'score']);

Route::get('jury/listscore', [JuryController::class, 'listscore']);
Route::get('/jury/listStudentDefense', [JuryController::class, 'listStudentDefense']);
Route::get('/jury/getscore', [JuryController::class, 'get_score']);


// Advisor API
Route::post('/advisor/register', [AdvisorController::class, 'register']);
// student API
Route::post('/student/register', [StudentController::class, 'register']);
Route::post('/student/create_project', [StudentController::class, 'create_project']);
Route::get('/student/show_project', [StudentController::class, 'show_project']);
Route::get('student/show_projectid/{id}', [StudentController::class, 'show_projectid']);
Route::get('/student/student_show_project', [StudentController::class, 'student_show_project']);
Route::get('/student/get_student', [StudentController::class, 'get_student']);
// Student Request Adviosr
Route::post('/student/req_advisor', [StudentController::class, 'studentRequestadvisor']);
Route::get('/student/get_request', [StudentController::class, 'get_request']);
// Advisor rejec
Route::post('/student/reject', [StudentController::class, 'advisor_reject']);
Route::post('/student/accept', [StudentController::class, 'advisor_accept']);


// Schedule Defense
Route::post('school/create_schedule', [ScheduleController::class, 'create']);
Route::post('school/update', [ScheduleController::class, 'update']);
// create Room
Route::post('school/create_room', [ScheduleController::class, 'create_room']);
// Show Room Has Create
Route::get('school/showroom_defense', [ScheduleController::class, 'showroom_defense']);
Route::get('school/showroom_id/{id}', [ScheduleController::class, 'showroom_defense_byId']);

Route::get('school/showroom', [ScheduleController::class, 'showroom']);
Route::get('school/show_schedule', [ScheduleController::class, 'show_schedule']);
Route::get('school/listcandidate', [ScheduleController::class, 'listCaditate']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return "Delete Token";
});
