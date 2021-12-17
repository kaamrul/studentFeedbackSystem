<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbackList = Feedback::all();
        // dd($feedbackList);
        return view('admin.feedback.feedbackList', get_defined_vars());
    }

    public function edit(Feedback $feedback, $id)
    {
        // dd("hello");
        $editFeedback = Feedback::find($id);
        $allStudent = User::where('user_type',3)->get();
        $allTeacher = User::where('user_type',2)->get();
        $allCourse = Course::all();
        return view ('admin.feedback.editFeedback', get_defined_vars());
    }

    public function update_feedback(Request $request)
    {
        Feedback::where('id',$request->id)->update([
            'teacher_id'=>$request->teacher_id,
            'course_id'=>$request->course_id,
            'student_id'=>$request->student_id,
            'feedback'=>$request->feedback,
        ]);

        $notification= array(
            'message' =>'Feedback Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back();
    }

    public function deleteFeedback(Feedback $feedback, $id)
    {
        // dd("ddd");
        Feedback::where('id',$id)->delete();
		$notification= array(
            'message' =>'Feedback Deleted successfully',
            'alert-type'=>'success'
        );
    	return redirect()->back();
    }
}
