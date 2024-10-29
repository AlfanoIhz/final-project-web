<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('assets/img/caffe.jpg') }}'); 
            background-size: cover;
            background-position: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-container {
            margin: 15% 20%;
            background-color: #e3e3e3;
            border-radius: 10px;
            display: flex;
            align-items: center;
        }

        .login-image {
            width: 100%;
            height: auto;
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
                <h3 class="text-center fw-bold my-4">Login</h3>
                <form class="mx-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control " id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn w-100" style="background-color: #b49149; color: white;">Login</button>
                </form>
            </div> 
        </div>
    </div>
</body>
</html>