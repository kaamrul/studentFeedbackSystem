<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackReply;
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




    // Feedback Panel For Teachers

    public function indexFeedbackList()
    {
        // dd("DD");
        $feedbackList = Feedback::all();
        // dd($feedbackList);
        return view('admin.teacherFeedback.feedback', get_defined_vars());
    }

    public function feedbackReply($id)
    {
        $feedbackID = Feedback::find($id);
        return view('admin.teacherFeedback.feedbackReply', get_defined_vars());
    }

    public function replyUpdate(Request $request)
    {
        // dd($request->all());
        $validatedData= $request->validate([
            'reply'=>'required'
        ]);

        $findFeedback = Feedback::where('id', $request->id)->first();
        // dd($findFeedback);

        $data = new FeedbackReply();
    	$data->feedback_id = $findFeedback->feedback_id;        
    	$data->teacher_id = $findFeedback->teacher_id;        
    	$data->student_id = $findFeedback->student_id;        
    	$data->course_id = $findFeedback->course_id;        
    	$data->reply = $request->reply;               
        $data->save();

        Feedback::where('id',$request->id)->update([
            'status'=>'1',
        ]);

        $notification= array(
            'message' =>'Replied successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('feedback-teachersList')->with($notification);
    }


    // Feedback Panel for Student
    public function giveFeedbackList()
    {
        // dd("DD");
        $feedbackList = Feedback::all();
        // dd($feedbackList);
        return view('admin.studentFeedback.feedbackList', get_defined_vars());
    }

    public function giveFeedback()
    {
        $allStudent = User::where('user_type',3)->get();
        $allTeacher = User::where('user_type',2)->get();
        $allCourse = Course::all();
        return view('admin.studentFeedback.giveFeedback', get_defined_vars());
    }

    public function give(Request $request)
    {
        // dd($request->all());
        $validatedData= $request->validate([
            'teacher_id'=>'required',
            'student_id'=>'required',
            'course_id'=>'required'
        ]);

        $data = new Feedback();        
    	$data->teacher_id = $request->teacher_id;        
    	$data->student_id = $request->student_id;        
    	$data->course_id = $request->course_id;        
    	$data->feedback = $request->feedback;               
    	$data->status = 0;               
        $data->save();


        $notification= array(
            'message' =>'Feedback Added Successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('feedback-studentList')->with($notification);
    }
    public function replyList()
    {
        // dd("DD");
        $feedbackList = FeedbackReply::all();
        //  dd($feedbackList);
        return view('admin.studentFeedback.replyListS', get_defined_vars());
    }
}
