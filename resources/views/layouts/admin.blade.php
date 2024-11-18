<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav .nav-link {
            color: #875500; 
            border-radius: 5px;
        }

        .sidebar-nav .nav-link.active, 
        .sidebar-nav .nav-link:hover {
            box-shadow: 2px 3px 5px rgba(0, 0, 0, 0.3);
            background-color: #875500; 
            color: white !important; 
            padding: 8px 12px;
        }

        .content-area {
            height: calc(100vh - 50px); 
            overflow-y: auto;
        }

        .description-cell {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar bg-body-tertiary border-bottom mt-1">
            <div class="container-fluid mx-4">
                <a href="{{ route('admin.dashboard') }}" class="logo">
                    <img src="{{ asset('assets/img/caffeine-colored.png') }}" alt="caffeine" class="" style="width:100%; height:35px;">
                </a>
                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome, {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: auto; right: 0;">
                            <form action="{{ route('admin.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item fw-semibold">Logout <i class="bi bi-box-arrow-right"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="row flex-nowrap" style="overflow: hidden;">
        <div class="col-md-2 bg-white d-flex flex-column p-3" style="min-width: 15%;">
            <ul class="nav flex-column sidebar-nav">
                <li class="nav-item mb-3"><a href="#" class="nav-link active"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
                <li class="nav-item mb-3"><a href="#" class="nav-link">Menu</a></li>
                <li class="nav-item mb-3"><a href="#" class="nav-link">Sales</a></li>
            </ul>
        </div>

        <div class="col-md-10 content-area " style="background-color: #f1f1f1;">
            @yield('content')
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/menuDetails.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>