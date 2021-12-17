@extends('admin.adminMaster')
@section('title')
Feedback Reply List
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				    <h3 class="box-title">Feedback Reply List</h3>
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
								<th>Student Name</th>
								<th>Date</th>
								<th>Feedback</th>
								<th>Reply</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i=1; ?>
                            @foreach($feedbackReplyList as $row)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->teacher->name}}</td>
                                <td>
                                    <?php
                                        $courseName=\App\Models\Course::where('id',$row->course_id)->first();
                                        echo $courseName->course_name ;
                                    ?>
                                </td>
                                <td>{{$row->student->name}}</td>
								<td>{{$row->reply_date}}</td>
								<td>
                                    <?php
                                        $feedbacks=\App\Models\Feedback::where('id',$row->feedback_id)->first();
                                        echo $feedbacks->feedback ;
                                    ?>                                    
                                </td>
								<td>{{$row->reply}}</td>

								<td>
                                    <a href="{{url('edit-reply-'.$row->id)}}" style="padding-right:15px;"><span class="fa fa-edit"></span></a>
                                    <a href="{{url('delete-reply-'.$row->id)}}"><span class="fa fa-trash"></span></a>
                                </td>

							</tr>
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