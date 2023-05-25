@if (Auth::check())

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INDEX</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
	
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
	<div class="container mt-4">
		<div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
					<h2><b>Add Employee Page</b></h2>
				</div>
				<div class="text-right">
					<a class="btn btn-info" href="{{route('employees.index') }}"> <i class="fa-solid fa-arrow-left fa-beat" style="color: #ffffff;"></i></a>
				</div>
			</div>
		</div>
		@if(session('status'))
		<div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
		@endif

		<form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="col-xs-12 col-sm-12 col-md-4 mx-auto">
			<div class="row mt-2">
				<div class="col-xs-12 col-sm-12 col-md-12 mx-auto">
                	<div class="form-group">
                    	<strong>Employee Fullname</strong>
                    	<input type="text" name="fullname" class="form-control" >
                    	@error('fullname')
                    	<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    	@enderror
                	</div>
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-15">
            		<div class="form-group">
                    	<strong>Employee Email Address</strong>
                    	<input type="text" name="email_address" class="form-control" >
                    	@error('email_address')
                    	<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    	@enderror
                	</div>
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-15">
            		<div class="form-group">
                    	<strong>Employee Username</strong>
                    	<input type="text" name="username" class="form-control" >
                    	@error('username')
                    	<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    	@enderror
                	</div>
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-12">
            		<div class="form-group">
                    	<strong>Employee Password</strong>
                    	<input type="password" name="password" class="form-control" >
                    	@error('password')
                    	<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    	@enderror
                	</div>
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-12">
            		<div class="form-group">
                    	<strong>Employee Status</strong>
                    	<input type="text" name="status" class="form-control" >
                    	@error('status')
                    	<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    	@enderror
                	</div>
            	</div>
				<button type="submit" class="btn mx-auto btn-primary">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>


@else

<script>
	window.location = "{{route('login')}}";
</script>

@endif
