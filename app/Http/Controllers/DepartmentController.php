<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departmentList = Department::all();
        return view('admin.department.viewDepartment', get_defined_vars());
    }

    public function create()
    {
        return view('admin.department.addDepartment', get_defined_vars());
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData= $request->validate([
            'department_name'=>'required'
        ]);

        $data = new Department();
    	$data->department_name = $request->department_name;        
        $data->save();

        $notification= array(
            'message' =>'Department Added successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('department-view')->with($notification);
    }

    public function edit(Department $department, $id)
    {
        $editDepartment = Department::find($id);
        return view('admin.department.editDepartment',get_defined_vars());
    }

    public function update(Request $request, Department $department)
    {
        // dd("Reply");
        Department::where('id',$request->id)->update([
            'department_name'=>$request->department_name,
        ]);

        $notification= array(
            'message' =>'Department Updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('department-view')->with($notification);
    }

    public function destroy(Department $department, $id)
    {
        Department::find($id)->delete();

        $notification= array(
            'message' =>'Department Deleted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('department-view')->with($notification);
    }
}
