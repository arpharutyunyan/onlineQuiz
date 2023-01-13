<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/subject-teachers/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'subjectTeachers'])->name('subject.teachers');
Route::get('/quiz/{id}', [\App\Http\Controllers\Admin\QuestionController::class, 'getQuestions_answers'])->name('quiz');
Route::post('/subject_store', [\App\Http\Controllers\Admin\SubjectController::class, 'add']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
