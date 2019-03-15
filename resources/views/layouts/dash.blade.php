<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name')}}</title>

    <!-- Bootstrap Core CSS -->
    
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/metisMenu.css') }}" rel="stylesheet">
 -->
    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

</head>

<body>
       <div id="wrapper">
           <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    {{config('app.name')}}
                </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">


                @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif


            </ul>
    

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-dashboard fa-fw"></i> Orders
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('admin/orders')}}">Order Management</a>
                                </li>
                                
                                <li>
                                    <a href="{{url('admin/canceledorders')}}">Canceled Orders</a>
                                </li>
                            </ul>
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li>
                            <a href="#">
                                <i class="fa fa-shopping-cart fa-fw"></i> Products
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/products') }}">All Products</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/products/create') }}" >Add Product</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/categories') }}" >Categories</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        
                        <li>
                            <a href="{{url('admin/products/promotional')}}">
                                <i class="fa fa-tags fa-fw"></i> Promotional Products
                            </a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ url('/admin/users') }}">
                                <i class="fa fa-user fa-fw"></i> Users
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="#">
                                <i class="fa fa-question fa-fw"></i> Enquiries
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/enquiries/unanswered') }}">
                                        Unanswered
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/enquiries/answered') }}">
                                        Answered
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-sliders fa-fw"></i> Slider
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/slider/') }}">
                                        All Slides
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/slider/create') }}">
                                        Add new
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
           
            <div class="row">
                <div class="col-lg-12">
                        <h1 class="page-header">@yield('page-header')</h1>
                </div>
            </div>
            
            @yield('content')
           <br>
           <br>
           <br>
        </div>
    </div>

    

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="{{ asset('js/metisMenu.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="{{ asset('js/sb-admin-2.js') }}"></script>

</body>

</html>
