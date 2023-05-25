<?php
use App\Models\Employee;
	$employees = Employee::all();
	$employees = Employee::paginate(10);
?>

@if (Auth::check())

<!DOCTYPE html>
<html lang="en">

<head>
	 <meta charset="utf-8">
	 <link rel="icon" href="{{ asset('librarylogo.jpg')}}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<meta charset="UTF-8">
	<title>Dashboard</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <style>
        * {
            font-family: arial;
        }
    </style>
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
                <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                                <li class="nav-item">
                                    <a class="nav-link text-danger" href="#">{{ __('Dashboard') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Menu
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        Menu 1
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        Menu 2
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        Menu 3
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        Menu 4
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                    </ul>









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
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12 margin-tb py-4">
				<div class="text-center">
					<h2><b>Employee Information</b></h2>
				</div>
				<div class="text-right mb-2">
					<a class="btn btn-success" href="{{route('employees.create') }}"> <i class="fa-sharp fa-solid fa-user-plus"></i></a>
				</div>
			</div>
		</div>
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
		<table id="dataTable2" class="table table-striped table-bordered" style="width: 105%;">
			<thead>
				<tr>
					<th>Employee ID</th>
					<th>Employee Fullname</th>
					<th>Employee Email Address</th>
					<th>Employee Username</th>
					<th>Employee Password</th>
					<th>Employee Status</th>
					<th style="width:500px">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($employees as $employee)
					<tr>
						<td>{{$employee->id}}</td>
						<td>{{$employee->fullname}}</td>
						<td>{{$employee->email_address}}</td>
						<td><code>{{$employee->username}}</code></td>
						<td><code>{{$employee->password}}</code></td>
						<td>{{$employee->status}}</td>
						<td>
							<form action="{{ route('employees.destroy',$employee->id) }}" method="Post">
								<a class="btn btn-info" href="{{ route('employees.edit',$employee->id) }}"><i class="fa-sharp fa-solid fa-marker fa-bounce fa-2xs" style="color: #ffffff;"></i></a>
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash-can fa-beat fa-2xs" style="color: #ffffff;"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<br><br><br>
		{!! $employees->links() !!}
	</div>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable2').DataTable();
        });
    </script>

</body>
</html>

@else

<script>
	window.location = "{{route('login')}}";
</script>

@endif
