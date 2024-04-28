<?php

use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentResultController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TestTrialController;

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
    if (!\Auth::check()) {
        return view('welcome');
    } else {
        return redirect()->route('home');
    }
})->name('home');

//Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post');
Route::delete('/posts/{id}', [App\Http\Controllers\PostController::class, 'destroy']);

Route::middleware(['auth'])->group(function () {
    Route::post('/fetch/subject/subcategories', [ApiDataController::class, 'fetchSubjectCategories'])->name('fetch.subjects.categories');
});


//Defining Admin ROutes

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    //Tests

    Route::get('take/exams/{test}', [TestController::class, 'takeExam'])->name('take.exam');
    Route::resource('tests', TestController::class);
    // Questions
    Route::get('questions/test_questions/{testID}', [QuestionController::class, 'createTestQuestion'])->name('tests.question.create');
    Route::post('questions/test_questions/{testID}', [QuestionController::class, 'storeTestQuestion'])->name('tests.question.store');


    //Test Results
    Route::get('get/test/result/{id}', [StudentResultController::class, 'getStudentResults'])->name('tests.result');
    Route::get('get/test/results/{id}', [StudentResultController::class, 'downloadTestResult'])->name('tests.result');
    Route::get('get/test/students/results/{id}', [StudentResultController::class, 'studentTests'])->name('tests.students.results');
    Route::get('get/students/tests/{id}', [StudentResultController::class, 'testResult'])->name('tests.students.result.show');


    Route::resource('questions', QuestionController::class);
    //Topics
    Route::resource('topics', TopicController::class);
});

//Student Route Groups
Route::group(['middleware' => ['auth', 'subscribed'], 'prefix' => 'student', 'as' => 'student.'], function () {
    //Tests
    Route::get('tests/take', [TestController::class, 'chooseTest'])->name('tests.take');
    Route::get('take/exams/{test}', [TestController::class, 'takeExam'])->name('take.exam');
    Route::resource('tests', TestController::class);
    // Questions
    Route::get('questions/test_questions/{testID}', [QuestionController::class, 'createTestQuestion'])->name('tests.question.create');
    Route::get('get/test/result/{id}', [StudentResultController::class, 'getStudentResults'])->name('tests.result');
    Route::get('get/test/results/{id}', [StudentResultController::class, 'downloadTestResult'])->name('tests.result');
    // Route::resource('questions', QuestionController::class);
});



//Orders Student
Route::group(['middleware' => ['auth'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('orders/student/index',[OrderController::class,'indexStudent'])->name('orders');
    Route::get('orders/student/create',[OrderController::class,'create'])->name('orders.create');
    Route::get('orders/student/completed',[OrderController::class,'completed'])->name('orders.completed');
    Route::get('orders/student/progress',[OrderController::class,'progress'])->name('orders.progress');
    Route::get('orders/student/cancelled',[OrderController::class,'cancelled'])->name('orders.cancelled');
});







//Stripe Subscriptions
Route::get('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe.create');
Route::post('/subscription/process', [SubscriptionController::class, 'processSubscription'])->name('subscription.process');
Route::get('/subscription/cancel', [SubscriptionController::class, 'cancelSubscription'])->name('subscription.cancel');
// welcome page only for subscribed users
// Route::get('/welcome', [SubscriptionController::class,''])->middleware('subscribed');


//Test Trial routes
Route::get('/tests/trial', [TestTrialController::class, 'index'])->name('tests.trial');
Route::post('/tests/trial/take', [TestTrialController::class, 'store'])->name('trial.test.take');
Route::post('fetch/tests', [TestTrialController::class, 'fetchTests'])->name('fetch.tests');
