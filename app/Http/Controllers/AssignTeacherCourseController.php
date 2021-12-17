<?php

namespace App\Http\Controllers;

use App\Models\AssignTeacherCourse;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AssignTeacherCourseController extends Controller
{
    public function index()
    {
        $assignList = AssignTeacherCourse::all();
        return view('admin.assignCourseToTeacher.viewAssignCourseTeacher', get_defined_vars());
    }

    public function create()
    {
        $allCourse = Course::all();
        $allTeacher = User::where('user_type',2)->get();
        return view('admin.assignCourseToTeacher.addAssignCourseTeacher', get_defined_vars());
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData= $request->validate([
            'teacher_id'=>'required'
        ]);

        $data = new AssignTeacherCourse();
    	$data->teacher_id = $request->teacher_id;        
    	$data->course_id = $request->course_id;        
        $data->save();

        $notification= array(
            'message' =>'Assign Course To Teacher Added successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('teacherss-view')->with($notification);
    }

    public function edit(AssignTeacherCourse $assignTeacherCourse, $id)
    {
        $editAssignTeacherCourses = AssignTeacherCourse::find($id);
        $allCourse = Course::all();
        $allTeacher = User::where('user_type',2)->get();
        return view('admin.assignCourseToTeacher.editAssignCourseTeacher',get_defined_vars());
    }

    public function update(Request $request, AssignTeacherCourse $assignTeacherCourse)
    {
        // dd("Reply");
        AssignTeacherCourse::where('id',$request->id)->update([
            'teacher_id'=>$request->teacher_id,
            'course_id'=>$request->course_id,
        ]);

        $notification= array(
            'message' =>'Assign Teacher Course Updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('teacherss-view')->with($notification);
    }

    public function destroy(AssignTeacherCourse $assignTeacherCourse, $id)
    {
        AssignTeacherCourse::find($id)->delete();

        $notification= array(
            'message' =>'Assign Teacher Course Deleted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('teacherss-view')->with($notification);
    }
}
