<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        ::-webkit-scrollbar {
            display: none; /* Safari and Chrome */
        }

        .container-fluid {
            padding: 0;
        }

        .row {
            margin: 0;
            overflow: hidden;  
        }

        .nav-link {
            color: #000000; 
            border-radius: 5px;
            decoration: none;
        }
        .nav-link.active {
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.4);
        }

        .nav-link.active, .nav-link:hover {
            background-color: #000000; 
            color: white !important; 
            border-radius: 5px;
            padding: 8px 12px;
        }

        .btn-outline-brown {
            color: #8B4513;
            border-color: #8B4513; 
        }

        .btn-outline-brown:hover {
            background-color: #8B4513;
            color: white;
        }

        .card{
            max-width: 180px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="row vh-100">
        <div class="vh-100 col-md-2 bg-white d-flex flex-column p-3" style="min-width: 15%;">
            <a href="{{ route('user.menu') }}" class="logo d-flex justify-content-center">
                <img src="{{ asset('assets/img/caffeine.png') }}" alt="caffeine" class="" style="width:auto; height:35px;">
            </a>
            <ul class="nav mt-4 flex-column">
                <li class="nav-item mb-3"><a href="{{ route('user.menu') }}" class="nav-link active">Menu</a></li>
                <li class="nav-item mb-3"><a href="#" class="nav-link">Table Services</a></li>
                <li class="nav-item mb-3"><a href="#" class="nav-link">Settings</a></li>
            </ul>
            <div class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle fw-semibold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: auto; right: 0;">
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item fw-semibold">Logout <i class="bi bi-box-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        

        <div class="container-fluid col-md-10" style="background-color: #f1f1f1;">
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
