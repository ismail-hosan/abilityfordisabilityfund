<style>
    .sidebar {
        width: 270px;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard')}}" class="brand-link">
        @if(empty(Auth::user()->image))
        <img class="brand-image img-circle elevation-3" style="opacity: .8" style="width: 50%"
            src="{{ URL::to('/') }}/admin_assets/logo/logo.jpeg">
        @else
        <img class="brand-image img-circle elevation-3" style="opacity: .8" style="width: 50%"
            src="{{asset('/images/'. Auth::user()->image)}}">
        @endif
        <span class="brand-text font-weight-light">{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('volunteer.dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('volunteer.profile', Auth::guard('volunteer')->user()->id)}}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </nav>
  
    </div>
    <!-- /.sidebar -->
</aside>
