<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('assets/img/caffe.jpg') }}'); 
            background-size: cover;
            background-position: center;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            padding: 7% 14% 7% 14%
        }

        .login-container {
            margin: 0% 0%;
            background-color: #e3e3e3;
            border-radius: 10px;
            display: flex;
            align-items: center;
        }

        .login-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .login-form {
            width: 60%;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="row"> 
            <div class="col-md-6">
                <div class="login-image col-lg-6">
                    <img src="{{ asset('assets/img/coffee.jpg') }}" alt="Coffee Image" class="img-fluid rounded-start">
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <h3 class="text-center fw-bold my-3">Register</h3>
                <h6 class="text-start fw-bold mb-1">Welcome to Caffeine!</h6>
                <p class="text-start me-4">Please Fill the sadsda</p>
                <form class="me-4" method="POST" action="{{ route('admin.register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for ="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control " id="password" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn w-100" style="background-color: #b49149; color: white;">Create</button>
                </form>
                <p class="text-center mt-2"><a href="{{ route('login-form') }}">Login</a> Instead</p>
            </div> 
        </div>
    </div>
</body>
</html>