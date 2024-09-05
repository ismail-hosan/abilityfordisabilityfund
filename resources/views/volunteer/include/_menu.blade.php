<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard')}}" class="brand-link">
        <img class="brand-image img-circle elevation-3" style="opacity: .8" style="width: 50%"
            src="{{ URL::to('/') }}/admin_assets/logo/biea.jpeg">
        <span class="brand-text font-weight-light">{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}</span>
    </a>

    <div class="sidebar">
        @if(Auth::user()->type == 1) 
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user-list') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Users </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('member-list') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Member </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all-payment-list') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>All Payments </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gallery') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Gallery </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rules') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Rules </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sliders') }}" class="nav-link">
                        <i style="color:red" class="nav-icon fas fa-image"></i>
                        <p>Sliders </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('zone')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Zone</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('social_media')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Social media</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('Journalpublications')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Journal And Publications</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i style="color: orange" class="nav-icon fas fa-envelope"></i>
                        <p>
                            Message
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category-index') }}" class="nav-link">
                                <i style="color: #00ACEA" class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                            <a href="{{ route('messages') }}" class="nav-link">
                                <i style="color: #00ACEA" class="far fa-circle nav-icon"></i>
                                <p>All Messages</p>
                            </a>

                        </li>


                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('Contactindex')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Contact And Advise</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('category-index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Category</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('aboutindex')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Aboute</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('index_video')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Video</p>
                    </a>
                </li>


            </ul>
        </nav>

        @elseif(Auth::user()->type == 2)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('memebr-payment') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Payment</p>
                    </a>
                </li>
            </ul>
        </nav>

        @elseif(Auth::user()->type == 3)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('myCv') }}" class="nav-link">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>My CV</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('memebr-payment') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Payment</p>
                    </a>
                </li>
            </ul>
        </nav>
        @elseif(Auth::user()->type == 4)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company_profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('memebr-payment') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Payment</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Job
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('jobs') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Jobs</p>
                            </a>
                            <a href="{{ route('add_job') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Job Post</p>
                            </a>
                            <a href="{{ route('appliedJobs') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Applications</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        @endif

        <!-- Sidebar Menu -->

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>