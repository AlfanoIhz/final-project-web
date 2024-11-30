<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        html {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .navbar {
            margin-bottom: 1rem;
        }
        
        body {
            background-image: url('{{ asset('assets/img/caffe.jpg') }}'); 
            background-size: cover;
            background-position: center;
            font-family: 'Poppins', sans-serif;
            /* overflow: hidden; */
        }

        .image-card {
            display: flex;
            align-items: stretch;
            height: 100%;
        }
    </style>
</head>
<body>
    
    
    <div class="container" style="margin-top: 0px;">
        <div class="row bg-light rounded" style="margin: 80px 100px;"> 
            <div class="col-md-6  px-0 py-0 d-block">
                <div class="image-card">
                    <img src="{{ asset('assets/img/coffee.jpg') }}" alt="Coffee Image" class="w-100 h-auto rounded" style="object-fit: cover;">
                </div>
            </div>

            <div class="col-md-6 ps-4 pt-5">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('loginError'))
                    <div class="alert alert-danger fs-6 alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="text-center mt-1 mb-4">
                    <img src="{{ asset('assets/img/caffeine.png') }}" alt="caffeine" style="width:auto; height:45px;">
                </div>
                <h6 class="text-start fw-bold">Welcome to Caffeine!</h6>
                <p class="text-start">Please login to your account.</p>
                <form class="me-4" method="POST" action="{{ route('user.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" autofocus required>
                        @if ($errors->has('email'))
                            <p class="text-danger" style="font-size: 12px;">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control " id="password" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <p class="text-danger" style="font-size: 12px;">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn w-100" style="background-color: #b49149; color: white;">Login</button>
                </form>
                <p class="text-center mt-3">Don't have an account? <a href="{{ route('user.register-form') }}">Register</a></p>
            </div> 
        </div>
    </div>
</body>
</html>