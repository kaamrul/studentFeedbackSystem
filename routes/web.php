<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeedbackReplyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssignTeacherCourseController;
use App\Http\Controllers\AssignStudentCourseController;


Route::get('/', function () {
    return view('login');  
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



Route::prefix('department')->group(function(){

    Route::get('/view',[DepartmentController::class,'index'])->name('department-view');
    Route::get('/add',[DepartmentController::class,'create'])->name('department-add');
    Route::post('/store',[DepartmentController::class,'store'])->name('department-store');
    Route::get('/edit/{id}',[DepartmentController::class,'edit']);
    Route::post('/update',[DepartmentController::class,'update'])->name('department-update');
    Route::get('/delete/{id}',[DepartmentController::class,'destroy']);

});


Route::prefix('course')->group(function(){

    Route::get('/view',[CourseController::class,'index'])->name('course-view');
    Route::get('/add',[CourseController::class,'create'])->name('course-add');
    Route::post('/store',[CourseController::class,'store'])->name('course-store');
    Route::get('/edit/{id}',[CourseController::class,'edit']);
    Route::post('/update',[CourseController::class,'update'])->name('course-update');
    Route::get('/delete/{id}',[CourseController::class,'destroy']);

});


Route::prefix('teacherss')->group(function(){

    Route::get('/view',[AssignTeacherCourseController::class,'index'])->name('teacherss-view');
    Route::get('/add',[AssignTeacherCourseController::class,'create'])->name('teacherss-add');
    Route::post('/store',[AssignTeacherCourseController::class,'store'])->name('teacherss-store');
    Route::get('/edit/{id}',[AssignTeacherCourseController::class,'edit']);
    Route::post('/update',[AssignTeacherCourseController::class,'update'])->name('teacherss-update');
    Route::get('/delete/{id}',[AssignTeacherCourseController::class,'destroy']);

});


Route::prefix('studentss')->group(function(){

    Route::get('/view',[AssignStudentCourseController::class,'index'])->name('studentss-view');
    Route::get('/add',[AssignStudentCourseController::class,'create'])->name('studentss-add');
    Route::post('/store',[AssignStudentCourseController::class,'store'])->name('studentss-store');
    Route::get('/edit/{id}',[AssignStudentCourseController::class,'edit']);
    Route::post('/update',[AssignStudentCourseController::class,'update'])->name('studentss-update');
    Route::get('/delete/{id}',[AssignStudentCourseController::class,'destroy']);

});

Route::prefix('feedback')->group(function(){

    Route::get('/teachersList',[FeedbackController::class,'indexFeedbackList'])->name('feedback-teachersList');
    Route::get('/reply/{id}',[FeedbackController::class,'feedbackReply'])->name('feedback-reply');
    Route::post('/replyUpdate',[FeedbackController::class,'replyUpdate'])->name('feedback-replyUpdate');

    Route::get('/studentList',[FeedbackController::class,'giveFeedbackList'])->name('feedback-studentList');
    Route::get('/giveFeedback',[FeedbackController::class,'giveFeedback'])->name('feedback-giveFeedback');
    Route::post('/give',[FeedbackController::class,'give'])->name('feedback-give');
    Route::get('/replyList',[FeedbackController::class,'replyList'])->name('feedback-replyList');


});

    // ***********************************************
});
