@extends('admin.adminMaster')
@section('title')
Give Feedback 
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				    <h5 class="box-title">Give Feedback 
                    </h5>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <form class="" method="post" action="{{route('feedback-give')}}">
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus">Select Teacher</label>
                                <select id="inputStatus" class="form-control custom-select" name="teacher_id">                              
                                    <option selected value="">Select Teacher</option>
                                    @foreach($allTeacher as $teacher)    
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Select Course</label>
                                <select id="inputStatus" class="form-control custom-select" name="course_id">                              
                                    <option selected value="">Select Course</option>
                                    @foreach($allCourse as $course)    
                                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Feedback</label>
                                <textarea type="text" class="form-control" name="feedback" value=""> </textarea>
                            </div>
                            <input type="hidden" name="student_id" value="{{(Auth::user()->id )}}">
                            
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