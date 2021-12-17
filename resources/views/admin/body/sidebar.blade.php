        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">

                <div class="user-profile">
                    <div class="ulogo">
                        <a href="{{route('dashboard')}}">
                            <!-- logo for regular state and mobile devices -->
                            <div class="d-flex align-items-center justify-content-center">
                                <h3><b>Admin</b> Dashboard</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">

                    <li>
                        <a href="{{route('dashboard')}}">
                            <i data-feather="pie-chart"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="user"></i>
                            <span>Manage Teacher</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('teacher-view')}}"><i class="ti-more"></i>view Teacher</a></li>
                            <li><a href="{{route('teacher-add')}}"><i class="ti-more"></i>Add Teacher</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="user"></i>
                            <span>Manage Student</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('student-view')}}"><i class="ti-more"></i>view Student</a></li>
                            <li><a href="{{route('student-add')}}"><i class="ti-more"></i>Add Student</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="user"></i>
                            <span>Manage Feedback</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('feedback-list')}}"><i class="ti-more"></i>Feedback List</a></li>
                            <li><a href="{{url('feedback-reply-list')}}"><i class="ti-more"></i>Feedback Reply List</a></li>
                        </ul>
                    </li>                    
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="user"></i>
                            <span>Manage Department</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="ti-more"></i>Department</a></li>
                        </ul>
                    </li>                   
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="user"></i>
                            <span>Manage Course</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="ti-more"></i>Course</a></li>
                        </ul>
                    </li>

                </ul>
            </section>
        </aside>