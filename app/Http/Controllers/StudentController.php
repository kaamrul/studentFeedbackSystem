<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;


class StudentController extends Controller
{
    
    public function index()
    {
        $departments = Department::all();
        $datas = User::where('user_type',3)->get();
        //dd($data);
        return view('admin.student.viewStudent',get_defined_vars());
    }

    
    public function create()
    {
        $departments = Department::all();
        //dd($data);
        return view('admin.student.addStudent',get_defined_vars());
    }

   
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData= $request->validate([

            'email'=>'required|unique:users',
            'name'=>'required'
        ]);

        $data = new User();

        $BranchlastData = User::latest('id')->first();
            if($BranchlastData):
                $BranchData = $BranchlastData->id+1;
            else:
                $BranchData = 1;
            endif;
            $branchCode = 'S-' . str_pad($BranchData, 4, "0", STR_PAD_LEFT);
            $data->unique_id = $branchCode;

    	$data->user_type = 3;
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->password = bcrypt($request->password);
        $data->phone = $request->phone;
        $data->department_id = $request->department_id;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->dob = date('Y-m-d',strtotime($request->dob));

        if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'),$filename);
                $data['image'] = $filename;
        }
        
        $data->save();

        $notification= array(
            'message' =>'Student Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('student-view')->with($notification);
    }

  
    public function edit($id)
    {
        $data = User::find($id);
        $departments = Department::all();
        return view('admin.student.editStudent',get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $data = User::find($id);
    	$data->name = $request->name;
    	$data->phone = $request->phone;
    	$data->gender = $request->gender;
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->department_id = $request->department_id;
        $data->address = $request->address;

       
    	$data->save();

        $notification= array(
            'message' =>'Student Edited successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('student-view')->with($notification);
    }

   
    public function destroy($id)
    {
        User::find($id)->delete();

        $notification= array(
            'message' =>'Student Deleted successfully',
            'alert-type'=>'error'
        );
       
        return Redirect()->route('student-view')->with($notification);
    }
}
