<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
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
    <div class="container">
        <div class="row bg-light rounded" style="margin: 80px 100px;"> 
            <div class="col-md-6 col-12 px-0 py-0 d-block">
                <div class="image-card">
                    <img src="{{ asset('assets/img/coffee.jpg') }}" alt="Coffee Image" class="w-100 h-auto rounded" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6 col-12 px-3">
                <h3 class="text-center fw-bold py-3">Register</h3>
                <h6 class="text-start fw-bold">Welcome to Caffeine!</h6>
                <p class="text-start">Fill the form below to register for an account.</p>
                <form class="me-4" method="POST" action="{{ route('admin.register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Username" required value="{{ old('name') }}" autofocus>
                        @if ($errors->has('name'))
                            <p class="text-danger" style="font-size: 12px;">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <p class="text-danger" style="font-size: 12px;">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <p class="text-danger" style="font-size: 12px;">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                        @if ($errors->has('password_confirmation'))
                            <p class="text-danger" style="font-size: 12px;">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn w-100" style="background-color: #b49149; color: white;">Create</button>
                </form>
                <p class="text-center mt-2">Already have an account? <a href="{{ route('admin.login-form') }}">Login</a></p>
            </div> 
        </div>
    </div>

</body>
</html>