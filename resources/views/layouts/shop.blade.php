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
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">{{config('app.name')}}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                    <form class="navbar-form" role="search" action="{{url('search')}}">
                        <div class="input-group add-on">
                            <input class="form-control" placeholder="Search products" name="q" type="text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                          </div>
                        </div>
                    </form>
                    </li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <a href="{{url('help')}}">
                                <span class="glyphicon glyphicon-refresh">
                                        
                                </span>
                                Help
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <span class="glyphicon glyphicon-log-out">
                                                
                                        </span>
                                        Logout
                                        
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{url('myorders')}}">
                                        <span class="glyphicon glyphicon-shopping-cart">
                                                
                                        </span>
                                        My Orders
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('myenquiries')}}">
                                        <span class="fa fa-question"></span>
                                        My Enquiries
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('mywishlist')}}">
                                        <span class="fa fa-heart"></span>
                                        My Wish List
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('myaddresses')}}">
                                        <span class="fa fa-home"></span>
                                        My Addresses
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="{{url('cart')}}" class="btn btn-default">
                            <span class="fa fa-shopping-cart"></span> CART
                            <span class="badge">{{count(session()->get('orders'))}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Browse by Category</p>
                <div class="list-group">
                    @foreach($categories as $category)
                        <a href="{{url('categories/'.$category->id)}}" class="list-group-item">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>

            <div class="col-md-9">
                @yield('content')
            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; {{config('app.name')}} 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    <script src="{{asset('js/app.js')}}"></script>

</body>

</html>
