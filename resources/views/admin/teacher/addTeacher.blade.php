@extends('admin.adminmaster')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content">
    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Add Teacher</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form method="post" action="{{route('teacher-store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">

                                <div class="row">
                                    <!-- 1st Row -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mobile Number <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="phone" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="gender" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Gender
                                                    </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->
                                </div> <!-- End 1stRow -->

                                <div class="row">
                                    <!-- 2nd Row -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" id="email">
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" class="form-control" id="password">
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="cPass" class="form-control" id="cPass">
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->

                                   

                                </div> <!-- End 2nd Row -->
                        
                                <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Department <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="department_id" id="department_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Department
                                                    </option>
                                                    @foreach ($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Date of Birth <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="dob" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->
                                </div>

                                <div class="row">
                                    <!-- 5TH Row -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Profile Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" class="form-control" id="image">
                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                    style="width: 100px; width: 100px; border: 1px solid #000000;">

                                            </div>
                                        </div>
                                    </div> <!-- End Col md 4 -->
                                </div> <!-- End 5TH Row -->

                                <div class="row">
                                    <!-- 6TH Row -->
                                    <div class="col-md-5">
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                        </div>
                                    </div>

                                </div> <!-- End 6TH Row -->
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>


<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>




@endsection
