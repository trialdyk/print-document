<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/dashboard',[Controller::class,'home'])->name('dashboard');

    Route::resource('classroom',ClassroomController::class);
    Route::resource('student',StudentController::class);
    Route::resource('year',YearController::class);
    Route::get('/print',[DocumentController::class,'index'])->name('print.index');

    Route::resource('rekap-spp', RekapController::class);
    Route::get('/print-depan/{id}',[DocumentController::class,'front']);
    Route::get('/print-belakang/{id}',[DocumentController::class,'back']);

    Route::prefix('/data')->group(function(){
        Route::get('/year',[YearController::class,'data']);
        Route::get('/classroom',[ClassroomController::class,'data']);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/try',[DocumentController::class,'convertToHTML']);

Route::get('/pdf',function(){
    return view('pdf');
});


require __DIR__.'/auth.php';
