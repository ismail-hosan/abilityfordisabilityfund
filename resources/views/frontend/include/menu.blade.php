<style type="text/css">
    nav.navbar.bootsnav li.dropdown ul.drop_nav {
        border-color: #07b107;
        width: 70% !important;
        margin-left: 10%;
    }

    nav.navbar.bootsnav li.dropdown ul.drop_nav_media {
        border-color: #07b107;
        width: 20% !important;
        margin-left: 20%;
    }

    nav.navbar.bootsnav li.dropdown ul.drop_nav_new {
        border-color: #07b107;
        width: 20% !important;
        margin-left: 10%;
    }

    nav.navbar.bootsnav li.dropdown ul.drop_nav {
        border-color: #07b107;
        width: 35% !important;
        margin-left: 10%;
    }

    .dropdown-menu {
        min-width: 200px;
    }

    .dropdown-menu.columns-2 {
        min-width: 400px;
    }

    .dropdown-menu.columns-3 {
        min-width: 600px;
    }

    .dropdown-menu li a {
        padding: 5px 15px;
        font-weight: 300;
    }

    .multi-column-dropdown {
        list-style: none;
    }

    .multi-column-dropdown li a {
        display: block;
        clear: both;
        line-height: 1.428571429;
        color: #333;
        white-space: normal;
    }

    .multi-column-dropdown li a:hover {
        text-decoration: none;
        color: #262626;
        background-color: #f5f5f5;
    }

    @media (max-width: 767px) {
        .dropdown-menu.multi-column {
            min-width: 240px !important;
            overflow-x: hidden;
        }
    }

    .sponsor-button {
        background-color: #224096 ;
        color: white;
        margin-left: 9px;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        font-family: Arial, sans-serif;
        cursor: pointer;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    .sponsor-button:hover {
        background-color: #ef018d;
    }
</style>
<nav class="navbar navbar-default navbar-fixed navbar-light white bootsnav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/')}}" style=" margin: 0; padding: 0;">
            <img style="width: 110px; padding: 0px 0px 0px 0px;margin-top: 18px;" class="img-responsive" src="{{ URL::to('/') }}/admin_assets/logo/ability-for-disability-fund.png" class="logo logo-scrolled" alt="">
        </a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu" style="float: right; margin-right: 30px; margin-top: 0px;margin-bottom: 20px;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="col-md-1"></div>
        <div class="collapse navbar-collapse mx-auto" id="navbar-menu" style="margin: 0 auto; display: table;">
            <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp" style="text-align: center">
                <li><a href=" {{ url('/')}}">HOME</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us</a>
                    <ul class="dropdown-menu multi-column columns-2 ">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    @foreach(App\Models\Category::where('type','About')->get() as $anoutmenu)
                                    <li>
                                        <a class="dropdown-item" href="{{'/view_aboutepage/'.$anoutmenu->id}}">{{$anoutmenu->title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    @foreach(App\Models\Category::where('type','Committee')->get() as $committeemenu)
                                    <li>
                                        <a class="dropdown-item" href="{{'/view_committeepage/'.$committeemenu->id}}">{{$committeemenu->title}} </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> OUR ACTIVITES </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="{{ url('/program')}}">PROGRAM</a>
                </li> --}}
                <li><a class="dropdown-item" href="{{ url('/project')}}">PROJECTS</a></li>
                <li><a class="dropdown-item" href="{{ url('/show-Program')}}">Program</a></li>
            </ul>
            </li>
            <li class="dropdown megamenu-fw">
            <li><a href="{{ url('/volunteer')}}"> GET INVOLVED </a></li>
            {{-- <li><a href="{{ url('/volunteer')}}">EVENT</a></li>
            <li><a href="{{ url('/volunteer')}}">SPORTS</a></li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Media </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href=" {{ url('/All-Gallery')}}">GALLERY</a></li>
                    <li><a href="/All-Video"></i>VIDEO</a></li>
                    <li><a href="{{ url('/news')}}">NEWS</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Donate US </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    {{-- <li><a href=" {{ url('/All-Gallery')}}">GALLERY</a>
            </li> --}}
            <li><a href="{{ url('login') }}"></i> Donor Login</a></li>
            <li><a href="{{ url('signin') }}">Donor Registration</a></li>
            </ul>
            </li>
            <li><a href=" {{ url('/Contact-Us')}}">CONTACT</a></li>
            <a href="{{Route('sponsor_child')}}">
                <button class="sponsor-button">Sponsor A Child</button>
            </a>
            <ul class="dropdown-menu megamenu-content drop_nav_media" role="menu">
                <div class="col-menu col-md-12">
                    <h6 class="title">Media gallery</h6>
                    <div class="content">
                        <ul class="menu-col">
                            <li><a href="/All-Gallery"><i class="fa fa-bullseye" aria-hidden="true"></i> GALLERY</a></li>
                            <li><a href="/All-Video"><i class="fa fa-youtube" aria-hidden="true"></i>Video</a></li>
                        </ul>
                    </div>
                </div>
            </ul>

            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="text-align: center;">
                @if(!empty(auth()->user()->id) && auth()->user()->type == 2)
                <li class="dropdown megamenu-fw left-br" id="navbar-menu">
                    <div class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" style="padding: 10px 20px; font-size: 10px"
                            data-toggle="dropdown">{{ auth()->user()->name }} <i
                                class="ace-icon fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu megamenu-content drop_nav_new pull-right" role="menu">
                            {{-- <li class="">
                                <div class="row "> --}}
                            <div class="col-menu col-md-4 ">
                                <div class="content">
                                    <ul class="menu-col">
                                        <li><a href="/admin">Dashboard</a></li>
                                        <li>
                                            <a style="color: red" class="dropdown-item "
                                                href="{{ route('logout') }}" onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- </div>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                @endif
                @if(!empty(auth()->user()->id) && auth()->user()->type == 1)
                <li class="dropdown megamenu-fw left-br" id="navbar-menu">
                    <div class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" style="padding: 10px 20px; font-size: 10px"
                            data-toggle="dropdown">{{ auth()->user()->name }} <i
                                class="ace-icon fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu megamenu-content drop_nav_new pull-right" role="menu">
                            <li class="">
                                <div class="row ">
                                    <div class="col-menu col-md-4 ">
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="/admin">Dashboard</a></li>
                                                <li>
                                                    <a style="color: red" class="dropdown-item "
                                                        href="{{ route('logout') }}" onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </div>

    </div>
</nav>

<!-- Sign Up Window Code -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">My jobs</a>
                        </li>
                        <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Employers</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content" id="myModalLabel2">
                        <div role="tabpanel" class="tab-pane fade in active" id="login">
                            <div class="subscribe wow fadeInUp">
                                <div class="col-sm-12 text-center">
                                    <p>Sign in or create your My jobs account to manage your profile</p>
                                    <a href="{{ url('emp_signin') }}" class="btn btn-sm btn-info">Sign In</a>
                                    <a href="{{ url('emp_signup') }}" class="btn btn-sm btn-info">Create Account</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="register">
                            <div class="col-sm-12  text-center">
                                <p>Sign in or create account to find the best candidates in the fastest way</p>
                                <a href="{{ url('corp_signin') }}" class="btn btn-sm btn-info">Sign In</a>
                                <a href="{{ url('corp_signup') }}" class="btn btn-sm btn-info">Create Account</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>