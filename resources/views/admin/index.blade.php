@extends('admin.adminmaster')

@section('content')

@if(Auth::user()->user_type == 1)

 <section class="content">
    <div class="row">
        
        <div class="col-xxxl-5 col-xl-6 col-12">
            <div class="box overflow-hidden">
                <div class="box-body p-0">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-12">
                            <div class="box no-shadow mb-0 rounded-0">
                                <div class="box-header no-border">
                                    <h4 class="box-title mb-0">
                                        Admin Dashboard
                                    </h4>
                                </div>
                                <div class="box-body p-0">
                                    <div class="media-list media-list-hover">
                                        <a class="media media-single hover-white" href="#">
                                            <div class="media-body">
                                                
                    <div class="row no-gutters">
                        <div class="col-md-12 col-12">
                            <h5>Name: {{Auth::user()->name}}</h5>
                            <h5>Phone: {{Auth::user()->phone}}</h5>
                            <h5>Email: {{Auth::user()->email}}</h5>
                            <h5>Gender: {{Auth::user()->gender}}</h5>
                            <h5>DOB: {{Auth::user()->dob}}</h5>
                            <h5>Address: {{Auth::user()->address}}</h5>
                        </div>
                    </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                <!-- /.content -->

@elseif(Auth::user()->user_type == 2)  
<section class="content">
    <div class="row">
    <div class="col-xxxl-5 col-xl-6 col-12">
            <div class="box overflow-hidden">
                <div class="box-body p-0">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-12">
                            <div class="box no-shadow mb-0 rounded-0">
                                <div class="box-header no-border">
                                    <h4 class="box-title mb-0">
                                        Teacher Dashboard
                                    </h4>
                                </div>
                                <div class="box-body p-0">
                                    <div class="media-list media-list-hover">
                                        <a class="media media-single hover-white" href="#">
                                            <div class="media-body">
                                                
                    <div class="row no-gutters">
                        <div class="col-md-12 col-12">
                            <h5>Name: {{Auth::user()->name}}</h5>
                            <h5>Phone: {{Auth::user()->phone}}</h5>
                            <h5>Email: {{Auth::user()->email}}</h5>
                            <h5>Gender: {{Auth::user()->gender}}</h5>
                            <h5>DOB: {{Auth::user()->dob}}</h5>
                            <h5>Address: {{Auth::user()->address}}</h5>
                        </div>
                    </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>             
@elseif(Auth::user()->user_type == 3) 
<section class="content">
    <div class="row">
    <div class="col-xxxl-5 col-xl-6 col-12">
            <div class="box overflow-hidden">
                <div class="box-body p-0">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-12">
                            <div class="box no-shadow mb-0 rounded-0">
                                <div class="box-header no-border">
                                    <h4 class="box-title mb-0">
                                        Student Dashboard
                                    </h4>
                                </div>
                                <div class="box-body p-0">
                                    <div class="media-list media-list-hover">
                                        <a class="media media-single hover-white" href="#">
                                            <div class="media-body">
                                                
                    <div class="row no-gutters">
                        <div class="col-md-12 col-12">
                            <h5>Name: {{Auth::user()->name}}</h5>
                            <h5>Phone: {{Auth::user()->phone}}</h5>
                            <h5>Email: {{Auth::user()->email}}</h5>
                            <h5>Gender: {{Auth::user()->gender}}</h5>
                            <h5>DOB: {{Auth::user()->dob}}</h5>
                            <h5>Address: {{Auth::user()->address}}</h5>
                        </div>
                    </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endif               
@endsection