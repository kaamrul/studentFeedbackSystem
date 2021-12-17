@extends('admin.adminMaster')
@section('title')
Assign Course To Student
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				    <h5 class="box-title">Assign Course To Student
                    </h5>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <form class="" method="post" action="{{route('studentss-store')}}">
                            @csrf
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label for="inputStatus">Select Student </label>
                                <select id="inputStatus" class="form-control custom-select" name="student_id" required="">                      
                                    <option selected value="">Select Student</option>    
                                    @foreach($allStudents as $students)    
                                        <option value="{{$students->id}}">{{$students->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Select Course </label>
                                <select id="inputStatus" class="form-control custom-select" name="course_id" required="">
                                <option selected value="">Select Course</option>
                                    @foreach($allCourse as $courses)    
                                        <option value="{{$courses->id}}">{{$courses->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label for="inputStatus">Select Academic Year </label>
                                <input type="date" name="academic_year" class="form-control" >
                            </div> -->
                            
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">                            
                            
                        </div>
                    </form>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->      
			</div> 
			
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- Main content -->
@endsection        