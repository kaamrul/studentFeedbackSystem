<?php

namespace App\Http\Controllers;

use App\Models\AssignStudentCourse;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AssignStudentCourseController extends Controller
{
    public function index()
    {
        $assignList = AssignStudentCourse::all();
        return view('admin.assignCourseToStudent.viewAssignCourseStudent', get_defined_vars());
    }

    public function create()
    {
        $allCourse = Course::all();
        $allStudents = User::where('user_type',3)->get();
        return view('admin.assignCourseToStudent.addAssignCourseStudent', get_defined_vars());
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData= $request->validate([
            'student_id'=>'required'
        ]);

        $data = new AssignStudentCourse();
    	$data->student_id = $request->student_id;        
    	$data->course_id = $request->course_id;        
        $data->save();

        $notification= array(
            'message' =>'Assign Course To Students Added successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('studentss-view')->with($notification);
    }

    public function edit(AssignStudentCourse $assignStudentCourse, $id)
    {
        $editAssignStudentsCourses = AssignStudentCourse::find($id);
        $allCourse = Course::all();
        $allStudents = User::where('user_type',2)->get();
        return view('admin.assignCourseToStudent.editAssignCourseStudent',get_defined_vars());
    }

    public function update(Request $request, AssignStudentCourse $assignStudentCourse)
    {
        // dd("Reply");
        AssignStudentCourse::where('id',$request->id)->update([
            'student_id'=>$request->student_id,
            'course_id'=>$request->course_id,
        ]);

        $notification= array(
            'message' =>'Assign Student Course Updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('studentss-view')->with($notification);
    }

    public function destroy(AssignStudentCourse $assignStudentCourse, $id)
    {
        AssignStudentCourse::find($id)->delete();

        $notification= array(
            'message' =>'Assign Student Course Deleted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('studentss-view')->with($notification);
    }
}
