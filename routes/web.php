<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizAttemptController;
use App\Http\Controllers\QuizAttendController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentQuizController;
use App\Http\Controllers\SubjectController;
use App\Models\ClassRoom;
use App\Models\Question;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth','verified'])->group(function (){

    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });


    Route::get('/classroom', function () {
        return Inertia::render('classrooms/index',[
            'classrooms'=> Auth::user()->classrooms
        ]);
    });




        Route::get('/dashboard/{classRoom}', [DashboardController::class, 'show']);

        Route::middleware(['can:create,App\Models\User'])->group(function () {

            Route::get('/subject/show/{classRoom}', [SubjectController::class, 'show']);
            Route::delete('/subject/delete/{subject}', [SubjectController::class, 'destroy']);


            Route::get('/ques/show/{quiz}', [QuestionController::class, 'index']);
            Route::get('/ques/create', [QuestionController::class, 'add'])->name('create');
            Route::post('/ques/add', [QuestionController::class, 'store']);
            Route::delete('/ques/delete/{question}', [QuestionController::class, 'destroy']);


            Route::get('/quiz/show/{subject}', [QuizController::class, 'show']);
            Route::post('/quiz/add', [QuizController::class, 'store']);
            Route::delete('/quiz/delete/{quiz}', [QuizController::class, 'destroy']);


            Route::post('/options/add', [OptionsController::class, 'store']);
            Route::get('options/show/{question}', [OptionsController::class, 'show']);
        });

    Route::get('/classroom/quizzes/{classRoom}',[StudentQuizController::class,'show']);
    Route::get('/classroom/quiz/attend',[QuizAttendController::class,'show']);
// Quiz routes
    Route::get('/quizzes/{quiz}', [QuizController::class, 'show']);

// Quiz attempt routes
    Route::post('/quiz-attempts', [QuizAttemptController::class, 'store']);
    Route::get('/quiz-attempts/{quizAttempt}', [QuizAttemptController::class, 'show']);
    Route::put('/quiz-attempts/{quizAttempt}', [QuizAttemptController::class, 'update']);




});
require __DIR__.'/auth.php';
