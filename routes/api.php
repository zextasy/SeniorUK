<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\LecturerController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CourseGroupController;

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

Route::middleware('api')->group(function () {
    Route::resource('students', StudentController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('lecturers', LecturerController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('semesters', SemesterController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('courses', CourseController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('course-groups', CourseGroupController::class);
});