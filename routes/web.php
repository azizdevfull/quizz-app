<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\Admin\Quiz\QuizController as AdminQuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('quizzes', QuizController::class);
Route::resource('quizzes.questions', QuestionController::class);
Route::get('quizzes/{quiz}/solve', [QuizController::class, 'solve'])->name('quizzes.solve');
Route::post('quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('quizzes', AdminQuizController::class);
    Route::resource('quizzes.questions', QuestionController::class);
});

require __DIR__ . '/auth.php';
