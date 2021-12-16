<?php

namespace App\Http\Controllers;

use App\Models\FeedbackReply;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbackReplyList = FeedbackReply::all();
        // dd($feedbackList);
        return view('admin.feedback.feedbackReplyList', get_defined_vars());
    }

    
    public function editReply(FeedbackReply $feedbackReply, $id)
    {
        // dd("dd");
        $editFeedbackReply = FeedbackReply::find($id);
        return view ('admin.feedback.editFeedbackReply', get_defined_vars());
    }
    public function updateFeedbackReply(Request $request)
    {
        // dd("Reply");
        FeedbackReply::where('id',$request->id)->update([
            'reply'=>$request->reply,
        ]);

        $notification= array(
            'message' =>'Feedback Reply Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back();
    }
    public function deleteReply(FeedbackReply $feedbackReply, $id)
    {
        // dd("ddd");
        FeedbackReply::where('id',$id)->delete();
		$notification= array(
            'message' =>'Feedback Reply Deleted successfully',
            'alert-type'=>'success'
        );
    	return redirect()->back();
    }
}
