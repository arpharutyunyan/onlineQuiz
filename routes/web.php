<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

Route::group(['middleware' => ['localization']], function() {
    Route::get('/', function () {
        $subjects = \App\Models\Subject::all();
        $teachers = \App\Models\Teacher::all();
        $local = \Illuminate\Support\Facades\Session::get('local');
        if ($local) {
            \Illuminate\Support\Facades\App::setLocale($local);
        }
        return view('welcome', compact('subjects', 'teachers'));
    })->name('welcome');


});

//Route::get('/quiz/{id}', [\App\Http\Controllers\Admin\QuestionController::class, 'getQuestions_answers'])->name('quiz');

//Route::get('quiz', function (){
//    return view('quiz.quizzes');
//})->name('quiz');

Route::resource('student', \App\Http\Controllers\Admin\StudentController::class);

//Auth::routes();
Auth::routes(['login' => true, 'register' => false]);


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){

    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');

    // group for subjects

    Route::prefix('subject')->group(function (){

        Route::get('/', [\App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('admin.subject');
        Route::get('create', [\App\Http\Controllers\Admin\SubjectController::class, 'create'])->name('subject.create');
        Route::post('create', [\App\Http\Controllers\Admin\SubjectController::class, 'store'])->name('subject.store');
        Route::get('show/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'show'])->name('subject.show');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'edit'])->name('subject.edit');
        Route::post('edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('subject.update');
        Route::DELETE('delete/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'destroy'])->name('subject.destroy');

    });

    Route::get('teacher/export', [\App\Http\Controllers\Admin\TeacherController::class, 'export'])->name('teacher_export');
    Route::resource('teacher', \App\Http\Controllers\Admin\TeacherController::class);

    Route::resource('question', \App\Http\Controllers\Admin\QuestionController::class);
    Route::resource('answer', \App\Http\Controllers\Admin\AnswerController::class);
//    Route::resource('quiz', \App\Http\Controllers\Admin\QuizController::class);
    Route::get('search', [\App\Http\Controllers\Admin\TeacherController::class, 'search_with_date'])->name('search');


});

Route::get('/language/{code}', function ($code) {

    \Illuminate\Support\Facades\Session::put('local', $code);

});

//Route::get('google',function(){
//
//    return view('googleAuth');
//
//});

Route::get('auth/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);

Route::get('google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//Route::get('facebook', function () {
//    return view('facebookAuth');
//});

Route::get('auth/facebook', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook']);
Route::get('/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

