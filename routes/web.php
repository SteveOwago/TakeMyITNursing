<?php

use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post');
Route::delete('/posts/{id}', [App\Http\Controllers\PostController::class, 'destroy']);

Route::middleware(['auth'])->group(function () {
    Route::post('/fetch/subject/subcategories',[ApiDataController::class,'fetchSubjectCategories'])->name('fetch.subjects.categories');
});


//Defining Admin ROutes

Route::group([['middleware'=>'auth'],'prefix'=>'admin','as'=>'admin.'], function(){
    //Tests
Route::get('take/exams/{test}',[TestController::class,'takeExam'])->name('take.exam');
    Route::resource('tests',TestController::class);
    // Questions
    Route::get('questions/test_questions/{testID}',[QuestionController::class,'createTestQuestion'])->name('tests.question.create');

    Route::resource('questions',QuestionController::class);
});
