@extends('admin.adminMaster')
@section('title')
Edit Feedback 
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				    <h5 class="box-title">Edit Feedback 
                    </h5>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <form class="" method="post" action="{{route('update-feedback')}}">
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus">Select Teacher</label>
                                <select id="inputStatus" class="form-control custom-select" name="teacher_id">                              
                                    <option selected value="{{$editFeedback->teacher_id}}">{{$editFeedback->teacher->name}}</option>
                                    @foreach($allTeacher as $teacher)    
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Select Course</label>
                                <?php
                                    $courseName=\App\Models\Course::where('id',$editFeedback->course_id)->first();
                                ?>
                                <select id="inputStatus" class="form-control custom-select" name="course_id">                              
                                    <option selected value="{{$editFeedback->course_id}}">{{$courseName->course_name}}</option>
                                    @foreach($allCourse as $course)    
                                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Select Student</label>
                                <select id="inputStatus" class="form-control custom-select" name="student_id">                              
                                    <option selected value="{{$editFeedback->student_id}}">{{$editFeedback->student->name}}</option>
                                    @foreach($allStudent as $student)    
                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Feedback</label>
                                <textarea type="text" class="form-control" name="feedback" value=""> {{$editFeedback->feedback}} </textarea>
                            </div>
                            <input type="hidden" name="id" value="{{$editFeedback->id}}">
                            
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