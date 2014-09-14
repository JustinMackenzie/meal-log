<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
			@section('title')
			My Meal Log
			@show
		</title>
        <meta name="author" content="AirHammer" />
        <meta name="developer" content="AirHammer" />
        <meta name="viewport" content="width=device-width">


        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

		@yield('scripts')

	</head>

	<body>

		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::route('home') }}">My Meal Log</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            @if(!Auth::check())
            <li><a href="{{ URL::route('login') }}">Login</a></li>
            @else
            <li><a href="{{ URL::route('entries.index') }}">Meal Log</a></li>
            <li><a href="{{ URL::route('weights.index') }}">Weight Log</a></li>
            <li><a href="{{ URL::route('signout') }}">Logout</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="content">
      	@yield('content')
      </div>
    </div><!-- /.container -->

		<!--Footer-->
		<footer class="footer">
			<small> 
		    	Powered by AirHammer
		  	</small>  
		</footer>
	</body>
</html>
