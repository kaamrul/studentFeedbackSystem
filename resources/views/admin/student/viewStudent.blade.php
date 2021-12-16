@extends('admin.adminmaster')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Student List</h3>
                    <a href="{{route('student-add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="10%">SL No.</th>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($datas as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->unique_id}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->department->department_name}}</td>
                                    <td>{{$user->gender}}</td>

                                    <td>
                                        <a href="{{url('student/edit/'.$user->id)}}" class="btn btn-info ">Edit</a>
                                        <a href="{{url('student/delete/'.$user->id)}}" class=" btn btn-danger "
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
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
