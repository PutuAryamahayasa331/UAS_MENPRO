<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\SubmissionController;
use App\Models\Submission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| 
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);

Route::group(
    ['middleware' => ['guest']],
    function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');

        Route::post('/login', [LoginController::class, 'authenticate']);

        Route::get('/signup_member', [RegisterController::class, 'signup_member']);

        Route::post('/signup_member', [RegisterController::class, 'store_member']);

        Route::get('/signup_contractor', [RegisterController::class, 'signup_contractor']);

        Route::post('/signup_contractor', [RegisterController::class, 'store_contractor']);
    }
);

Route::group(
    ['middleware' => ['auth']],
    function () {

        Route::get('/profile', [UserController::class, 'index']);

        Route::get('/profile/{user:username}', [UserController::class, 'profile']);

        Route::get('/profile-edit', [UserController::class, 'edit']);

        Route::post('/profile-edit/{user:id}', [UserController::class, 'store']);

        Route::get('/posting-job', [JobsController::class, 'index'])->middleware('accessUsers:member');

        Route::get('/posting-job/checkSlug', [JobsController::class, 'checkSlug'])->middleware('accessUsers:member');

        Route::post('/posting-job', [JobsController::class, 'store'])->middleware('accessUsers:member');

        Route::get('/edit-job/{job:slug}', [JobsController::class, 'edit'])->middleware('accessUsers:member');

        Route::post('/edit-job/{job:slug}', [JobsController::class, 'update'])->middleware('accessUsers:member');

        Route::get('/jobs', [JobsController::class, 'jobs']);

        Route::get('/jobs/{job:slug}', [JobsController::class, 'show']);

        Route::post('/offer/{job:id}', [SubmissionController::class, 'index'])->middleware('accessUsers:contractor');

        Route::get('/submissions', [SubmissionController::class, 'contractor'])->middleware('accessUsers:contractor');

        Route::get('/submission/{job:slug}', [SubmissionController::class, 'member'])->middleware('accessUsers:member');

        Route::post('/decline/{sub:id}', [SubmissionController::class, 'decline'])->middleware('accessUsers:member');

        Route::post('/accept/{sub:id}', [SubmissionController::class, 'accept'])->middleware('accessUsers:member');

        Route::get('/progress/{job:slug}', [SubmissionController::class, 'progress'])->middleware('accessUsers:member');

        Route::post('/dojob/{sub:id}', [SubmissionController::class, 'dojob'])->middleware('accessUsers:contractor');

        Route::post('/done_/{sub:id}', [SubmissionController::class, 'done_'])->middleware('accessUsers:contractor');

        Route::post('/done/{sub:id}', [SubmissionController::class, 'done'])->middleware('accessUsers:member');

        Route::get('/review/{sub:id}', [SubmissionController::class, 'review'])->middleware('accessUsers:member');

        Route::post('/review/{sub:id}', [SubmissionController::class, 'store'])->middleware('accessUsers:member');

        Route::get('/cities', [JobsController::class, 'city']);

        Route::get('/allcategories', [CategoryController::class, 'index']);

        Route::get('/categories', [CategoryController::class, 'category']);

        Route::get('/job-detail', function () {
            return view('guest.jobdetail', ['title' => 'HandyHelp | Job Detail']);
        });

        Route::get('/logout', [RegisterController::class, 'destroy']);

        Route::get('/review', function () {
            return view('member.review', ['title' => 'HandyHelp | Review']);
        });
    }
);
