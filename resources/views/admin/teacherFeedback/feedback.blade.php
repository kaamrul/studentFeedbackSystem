@extends('admin.adminMaster')
@section('title')
Feedback List
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				    <h3 class="box-title">Feedback List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>SL</th>
								<th>Teachet Name</th>
								<th>Course Name</th>
								<th>Date</th>
								<th>Feedback</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i=1; ?>
                            @foreach($feedbackList as $row)
                            @if($row->teacher_id == Auth::user()->id)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->teacher->name}}</td>
                                <td>
                                    <?php
                                        $courseName=\App\Models\Course::where('id',$row->course_id)->first();
                                        echo $courseName->course_name ;
                                    ?>
                                </td>
								<td>{{$row->feedback_date}}</td>
								<td>{{$row->feedback}}</td>
								<td>
                                    @if($row->status == 0)
                                        <span style="background-color:red;padding:10px; color:white; font-weight:bold;">Pending</span>
                                    @elseif($row->status == 1)
                                        <span style="background-color:green;padding:10px; color:white; font-weight:bold;">Complete</span>
                                    @endif
                                </td>
								<td>
                                    <a href="{{url('feedback/reply/'.$row->id)}}" class="btn btn-info ">Reply</a>
                                </td>

							</tr>
                            @endif
                            @endforeach						
						</tbody>
						<!-- <tfoot>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th>Start date</th>
								<th>Salary</th>
							</tr>
						</tfoot> -->
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