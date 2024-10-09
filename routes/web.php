<?php

use App\Models\Data;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsStudent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAlumniController;
use App\Http\Controllers\DashboardCareerController;

Route::get('/', function () {
    return view('index', [
        'title' => 'Home',
        'users' => User::all(),
        'careers' => Career::paginate(4),
        'alumnus' => Alumni::all(),
    ]);
});

Route::resource('/dashboard/users', DashboardUserController::class)->middleware(['auth', IsAdmin::class]);

Route::resource('/dashboard/careers', DashboardCareerController::class)->middleware(['auth', 'verified']);

Route::resource('/dashboard/alumnus', DashboardAlumniController::class)->parameters(['alumnus' => 'alumni'])->middleware(['auth', 'verified']);

// Custom route with parameter (define this first)
Route::get('/dashboard/applications/create/{career}', [ApplicationController::class, 'create'])
    ->name('applications.create')
    ->middleware(['auth', 'verified']);

// Define the resource route after (excluding the default 'create' route)
Route::resource('/dashboard/applications', ApplicationController::class)
    ->except(['create']) // Exclude default 'create' method to avoid conflict
    ->middleware(['auth', 'verified', IsStudent::class]);

Route::post('/dashboard/applicants/{applicant}/accept', [ApplicantsController::class, 'accept'])->name('applicants.accept');
Route::post('/dashboard/applicants/{applicant}/reject', [ApplicantsController::class, 'reject'])->name('applicants.reject');

Route::get('/dashboard/applicants/accepted', [ApplicantsController::class, 'accepted'])->name('applicants.accepted');
Route::get('/dashboard/applicants/rejected', [ApplicantsController::class, 'rejected'])->name('applicants.rejected');
Route::get('/dashboard/applicants/pending', [ApplicantsController::class, 'pending'])->name('applicants.pending');

Route::resource('/dashboard/applicants', ApplicantsController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function(){
    return view('Yay you are an admin');
})->middleware(IsAdmin::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
