<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;



Route::get('/', function () {
    return view('well');  
}); 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function (){

    //-------------------------------------------------------------------------------//
    //---------------------------------Sarowar---------------------------------------//
    //------------------------------------------------------------------------------//

    
Route::prefix('student')->group(function(){

    Route::get('/view',[StudentController::class,'index'])->name('student-view');
    Route::get('/add',[StudentController::class,'create'])->name('student-add');
    Route::post('/store',[StudentController::class,'store'])->name('student-store');
    Route::get('/edit/{id}',[StudentController::class,'edit']);
    Route::post('/update/{id}',[StudentController::class,'update']);
    Route::get('/delete/{id}',[StudentController::class,'destroy']);

});

Route::prefix('teacher')->group(function(){

    Route::get('/view',[TeacherController::class,'index'])->name('teacher-view');
    Route::get('/add',[TeacherController::class,'create'])->name('teacher-add');
    Route::post('/store',[TeacherController::class,'store'])->name('teacher-store');
    Route::get('/edit/{id}',[TeacherController::class,'edit']);
    Route::post('/update/{id}',[TeacherController::class,'update']);
    Route::get('/delete/{id}',[TeacherController::class,'destroy']);

});

     //-------------------------------------------------------------------------------//
    //---------------------------------End Sarowar---------------------------------------//
    //------------------------------------------------------------------------------//


});
