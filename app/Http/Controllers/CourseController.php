<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    public function index()
    {
        $courseList = Course::all();
        return view('admin.course.viewCourse', get_defined_vars());
    }

    public function create()
    {
        return view('admin.course.addCourse', get_defined_vars());
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData= $request->validate([
            'course_name'=>'required'
        ]);

        $data = new Course();
    	$data->course_name = $request->course_name;        
        $data->save();

        $notification= array(
            'message' =>'Course Added successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('course-view')->with($notification);
    }

    public function edit(Course $course, $id)
    {
        $editCourse = Course::find($id);
        return view('admin.course.editCourse',get_defined_vars());
    }

    public function update(Request $request, Course $course)
    {
        // dd("Reply");
        Course::where('id',$request->id)->update([
            'course_name'=>$request->course_name,
        ]);

        $notification= array(
            'message' =>'Course Updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('course-view')->with($notification);
    }

    public function destroy(Course $course, $id)
    {
        Course::find($id)->delete();

        $notification= array(
            'message' =>'Course Deleted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('course-view')->with($notification);
    }
}
