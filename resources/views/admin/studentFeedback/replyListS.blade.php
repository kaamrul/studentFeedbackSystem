@extends('admin.adminMaster')
@section('title')
Reply Feedback List
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Reply Feedback List</h3>
                    <a href="{{route('feedback-giveFeedback')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add New Feedback</a>
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
								<th>Date</th>
								<!-- <th>Feedback</th> -->
								<th>Reply</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i=1; ?>
                            @foreach($feedbackList as $row)
                            @if($row->student_id == Auth::user()->id)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->teacher->name}}</td>
                                <td>
                                    <?php
                                        $courseName=\App\Models\Course::where('id',$row->course_id)->first();
                                        echo $courseName->course_name ;
                                    ?>
                                </td>
								<td>{{$row->created_at}}</td>
								<!-- <td>
                                    {{$row->feedbacks->feedback}}
                                </td> -->
                                <td>
                                    {{$row->reply}}
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