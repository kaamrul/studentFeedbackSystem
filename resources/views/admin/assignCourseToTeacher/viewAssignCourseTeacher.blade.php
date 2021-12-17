@extends('admin.adminMaster')
@section('title')
Assign Course To Teacher List
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
             <div class="box-header with-border">
                    <h3 class="box-title">Assign Course To Teacher List</h3>
                    <a href="{{route('teacherss-add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Assign New Course</a>
                </div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>SL</th>
								<th>Teacher Name</th>
								<th>Course Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i=1; ?>
                            @foreach($assignList as $row)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->teacher->name}}</td>
								<td>
                                    <?php
                                        $courseName=\App\Models\Course::where('id',$row->course_id)->first();
                                        echo $courseName->course_name ;
                                    ?>
                                </td>
								<td>
                                    <a href="{{url('teacherss/edit/'.$row->id)}}" class="btn btn-info ">Edit</a>
                                    <a href="{{url('teacherss/delete/'.$row->id)}}" class=" btn btn-danger "
                                        id="delete">Delete</a>
                                </td>
							</tr>
                            @endforeach						
						</tbody>
					</table>
					</div>
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