@extends('admin.adminMaster')
@section('title')
Add Department 
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				    <h5 class="box-title">Add Department 
                    </h5>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <form class="" method="post" action="{{route('department-store')}}">
                            @csrf
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label for="inputStatus">Department Name</label>
                                <input type="text" class="form-control" name="department_name" value=""> 
                            </div>
                            
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