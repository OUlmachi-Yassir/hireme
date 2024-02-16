<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileController2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EnterpriseInfoController;
use App\Http\Controllers\jobeController;


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



Route::post('/enterprise-info', [EnterpriseInfoController::class, 'store'])->name('enterprise.info.store');
Route::get('/enterprise-info', [EnterpriseInfoController::class, 'entrepriseinfo'])->name('enterprise.info');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');       
Route::get('/myPost', function () {
    return view('myPost');
})->middleware(['auth', 'verified'])->name('myPost');   

// User routes
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

// CV routes
Route::get('/cv/{id}/edit', [CVController::class, 'edit'])->name('cv.edit');
Route::put('/cv/{id}', [CVController::class, 'update'])->name('cv.update');

// Profile routes
Route::get('/profile/edit', [ProfileController2::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController2::class, 'update'])->name('profile.update');
Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');


// Skill routes
Route::get('/skill/{id}/edit', [SkillController::class, 'edit'])->name('skill.edit');
Route::put('/skill/{id}', [SkillController::class, 'update'])->name('skill.update');




// Experience routes
Route::get('/experience/{id}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
Route::put('/experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');

// Education routes
Route::get('/education/{id}/edit', [EducationController::class, 'edit'])->name('education.edit');
Route::put('/education/{id}', [EducationController::class, 'update'])->name('education.update');

// Language routes
Route::get('/language/{id}/edit', [LanguageController::class, 'edit'])->name('language.edit');
Route::put('/language/{id}', [LanguageController::class, 'update'])->name('language.update');




Route::get('/cvs/create', [CVController::class, 'create'])->name('cvs.create');
Route::post('/cvs', [CVController::class, 'store'])->name('cvs.store');


// web.php
Route::get('/info', [ProfileController::class, 'infoForm'])->name('info.form');
Route::post('/info/save', [ProfileController::class, 'saveProfile'])->name('profile.save');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
Route::get('/profile/resume', [ProfileController::class, 'showResume'])->name('profile.resume');



Route::view('/dashboard-utilisateur', 'dashUtilisateur')->name('dashboard.utilisateur');
Route::view('/dashboard-entreprise', 'dashEntreprise')->name('dashboard.entreprise');
Route::post('/jobe/new', [jobeController::class, 'store'])->name('jobe.store');
Route::get('/myPost', [jobeController::class, 'index'])->name('myPost');
Route::get('/dashboard', [jobeController::class, 'anotherPgae'])->name('dashboard');
Route::get('/search', [jobeController::class, 'ajaxSearch'])->name('jobe.search');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  
});


Route::middleware('auth')->group(function () {
    Route::get('/my_profile', [ProfileController::class, 'editProfile'])->name('my_profile.edit');
    Route::put('/my_profile/update', [ProfileController::class, 'updateProfile'])->name('my_profile.update');
    Route::post('/my_profile/skills', [SkillController::class, 'store'])->name('my_profile.skills.store');
});


require __DIR__.'/auth.php';
