@extends('admin.adminMaster')
@section('title')
Department List
@endsection
@section('content')        
        <!-- Main content -->
        <section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
             <div class="box-header with-border">
                    <h3 class="box-title">Department List</h3>
                    <a href="{{route('department-add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Department</a>
                </div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>SL</th>
								<th>Department Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i=1; ?>
                            @foreach($departmentList as $row)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->department_name}}</td>
								<td>
                                    <a href="{{url('department/edit/'.$row->id)}}" class="btn btn-info ">Edit</a>
                                    <a href="{{url('department/delete/'.$row->id)}}" class=" btn btn-danger "
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