@extends('admin.adminMaster')
@section('title')
Reply Feedback
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				    <h5 class="box-title">Reply Feedback
                    </h5>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <form class="" method="post" action="{{route('feedback-replyUpdate')}}">
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus">Reply</label>
                                <textarea type="text" class="form-control" name="reply" value=""></textarea>
                            </div>
                            <input type="hidden" name="id" value="{{$feedbackID->id}}">
                            
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