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
    <?php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    $admin_status = Auth::user()->status;
    $admin_id = Auth::user()->id;
    $type = Auth::user()->type;
    $navs = DB::table('navigation')->where('active', '1')->where('parent_id', '0')->orderBy('orderBy', 'DESC')->get();
    ?>
    
    <!-- Sidebar -->
    <div class="sidebar">
        @if(Auth::user()->type == 1)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('dashboard')}}" class="nav-link active">
                        <i style="color: aqua" class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>
               
                <?php
                    foreach ($navs as $each_menu):
                        $sub_menu = DB::table('admin_role')->where('parent_id', $each_menu->navigation_id)->where('admin_id', $admin_id)->get();
                    ?>
                   
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i style="color: rgb(93, 176, 255)" class="nav-icon fas fa-bars"></i>
                        <p>
                            <?php echo $each_menu->label; ?>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <?php if (!empty($sub_menu)): ?>
                    <ul class="nav nav-treeview">
                        <?php
                            foreach ($sub_menu as $each_submenu):
                            if (!empty($each_submenu)):
                                $single_submenu = DB::table('navigation')->where('navigation_id', $each_submenu->navigation_id)->get();
                                $url = $single_submenu[0]->url;
                                // $link = site_url($url);
                                $label = $single_submenu[0]->label;
                        ?>
                        <li class="nav-item">
                            <a href="{{ $url }}" class="nav-link">
                                <i style="color: #ff0000" class="far fa-circle nav-icon"></i>
                                <p> <?php echo $label; ?> </p>
                            </a>
                        </li>
                        <?php
                        endif;
                        endforeach;
                        ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <?php endforeach ; ?>
            </ul>
            <br>
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
                    <a href="{{ route('donorHistory') }}" class="nav-link">
                        <i class="nav-icon far fa-file"></i>
                        <p>Donate History</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>Profile</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('viewresume') }}" class="nav-link">
                        <i class="nav-icon far fa-file"></i>
                        <p>My Resume</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile')}}" class="nav-link">
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
                <li class="nav-item">
                    <a href="{{ route('reference_list') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>All Refer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('id_card') }}" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>ID card</p>
                    </a>
                </li> --}}
                <!-- <li class="nav-item">
                    <a href="{{ route('Withdrawview') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Withdraw</p>
                    </a>
                </li> -->
            </ul>
        </nav>
        @elseif(Auth::user()->type == 3)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{-- <li class="nav-item ">
                    <a href="{{ route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('viewresume') }}" class="nav-link">
                        <i class="nav-icon far fa-file"></i> <p>My Resume</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i> <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('myCv') }}" class="nav-link">
                        <i class="nav-icon fas fa-eye"></i> <p>My CV</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('memebr-payment') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Payment</p>
                    </a>
                </li>
            </ul> --}}
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
                {{-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p> Job <i class="right fas fa-angle-left"></i>
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
                </li> --}}
            </ul>
        </nav>
        @endif
    </div>
    <!-- /.sidebar -->
</aside>
