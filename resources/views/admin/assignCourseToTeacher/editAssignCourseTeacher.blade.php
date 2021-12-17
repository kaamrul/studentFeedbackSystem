@extends('admin.adminMaster')
@section('title')
Edit Assign Course To Teacher
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				    <h5 class="box-title">Edit Assign Course To Teacher
                    </h5>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <form class="" method="post" action="{{route('teacherss-update')}}">
                            @csrf
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label for="inputStatus">Select Teacher </label>
                                <select id="inputStatus" class="form-control custom-select" name="teacher_id" required="">                      
                                    <option selected value="{{$editAssignTeacherCourses->teacher_id}}">{{$editAssignTeacherCourses->teacher->name}}</option>    
                                    @foreach($allTeacher as $teachers)    
                                        <option value="{{$teachers->id}}">{{$teachers->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Select Course </label>
                                    <?php
                                        $courseName=\App\Models\Course::where('id',$editAssignTeacherCourses->course_id)->first();
                                    ?>
                                <select id="inputStatus" class="form-control custom-select" name="course_id" required="">
                                <option selected value="{{$editAssignTeacherCourses->course_id}}">{{$courseName->course_name}}</option>
                                    @foreach($allCourse as $courses)    
                                        <option value="{{$courses->id}}">{{$courses->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="id" value="{{$editAssignTeacherCourses->id}}">
                            
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