<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeedbackReplyController;


Route::get('/', function () {
    return view('well');  
}); 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function (){
    // Kamrul Route
    // *********************************************** 
    Route::get('feedback-list', [FeedbackController::class, 'index']);
    Route::get('edit-feedback-{id}', [FeedbackController::class, 'edit']);
    Route::post('update-feedback', [FeedbackController::class, 'update_feedback'])->name('update-feedback');
    Route::get('delete-feedback-{id}', [FeedbackController::class, 'deleteFeedback']);

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
   

    Route::get('feedback-reply-list', [FeedbackReplyController::class, 'index']);
    Route::get('edit-reply-{id}', [FeedbackReplyController::class, 'editReply']);
    Route::post('update-feedback-reply', [FeedbackReplyController::class, 'updateFeedbackReply'])->name('update-feedback-reply');
    Route::get('delete-reply-{id}', [FeedbackReplyController::class, 'deleteReply']);



    


    // ***********************************************
});
