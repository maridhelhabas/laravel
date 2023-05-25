<html>
    <head>
            <link rel="icon" href="{{ asset('librarylogo.jpg')}}" type="image/x-icon">
            <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-5 col-lg-5 mx-auto">
            <div class="card mt-5">
                <div class=" mx-auto rounded-circle mt-4">
                    <img class="rounded-circle" src="{{ asset('librarylogo.jpg')}}" width="200px"  height="200px"/>
                </div>
                <div class="card-title mx-auto mt-4"><h3>Library Management System</h3></div>
                <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="floatingInput" required placeholder="name@example.com" autocomplete="current-password">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword"  required placeholder="Password" autocomplete="current-password" >
                        <label for="floatingPassword">Password</label>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <br>

                                <li class="nav-item text-right " style="list-style-type: none;">
                                    Don't have an account yet?
                                    <a class="nav-link" style="text-decoration: none;color:blue" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>

                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-outline-success" type="submit">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

</body>
</html>