<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;


class TeacherController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $datas = User::where('user_type',2)->get();
        //dd($data);
        return view('admin.teacher.viewTeacher',get_defined_vars());
    }

    
    public function create()
    {
        $departments = Department::all();
        //dd($data);
        return view('admin.teacher.addTeacher',get_defined_vars());
    }

   
    public function store(Request $request)
    {
        // dd($request->all());
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
            $branchCode = 'T-' . str_pad($BranchData, 4, "0", STR_PAD_LEFT);
            $data->unique_id = $branchCode;

    	$data->user_type = 2;
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
            'message' =>'Teacher Inserted successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('teacher-view')->with($notification);
    }

  
    public function edit($id)
    {
        $data = User::find($id);
        $departments = Department::all();
        return view('admin.teacher.editTeacher',get_defined_vars());
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
            'message' =>'Teacher Edited successfully',
            'alert-type'=>'success'
        );
       
        return Redirect()->route('teacher-view')->with($notification);
    }

   
    public function destroy($id)
    {
        User::find($id)->delete();

        $notification= array(
            'message' =>'Teacher Deleted successfully',
            'alert-type'=>'error'
        );
       
        return Redirect()->route('teacher-view')->with($notification);
    }
}
