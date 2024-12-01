<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        html {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        ::-webkit-scrollbar {
            display: none;
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
            text-decoration: none;
        }
        
        .nav-link:focus{
            color: inherit;
            text-decoration: none;
        }

        .nav-link.active {
            color: inherit;
            text-decoration: none;
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
            height: 380px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .menu-description{
            font-size: 14px;
            max-width: 180px;
            max-height: 45px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }

        .item-count {
            display: flex;
            align-items: center; 
        } 

        .count-btn {
            display: flex; 
            justify-content: center;
            align-items: center;
            font-size: 15px;
            height: 20px;
            width: 20px;
            border: none; 
            background: transparent;
            cursor: pointer;
        }

        .input-size {
            width: 25px;
            height: 15px;
            padding: 0.15rem; 
            font-size: 0.675rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="row vh-100">
        <div class="col-md-2 bg-white d-flex flex-column p-3" style="min-width: 15%;">
            <a href="{{ route('landing-page') }}" class="logo d-flex justify-content-center">
                <img src="{{ asset('assets/img/caffeine.png') }}" alt="caffeine" style="width:auto; height:35px;">
            </a>
            <div class="sidebar d-flex flex-column flex-grow-1">
                <div class="d-flex flex-column">
                    <ul class="nav mt-4 flex-column">
                        <li class="nav-item mb-3">
                            <a href="{{ route('user.menu') }}" class="nav-link {{ ($title === 'Menu') ? 'active' : '' }}"><i class="bi bi-journal-text"></i> Menu</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link {{ ($title === 'Orders') ? 'active' : '' }}"><i class="bi bi-receipt-cutoff"></i> My Order</a>
                        </li>
                        <!-- <li class="nav-item mb-3">
                            <a href="#" class="nav-link">Settings</a>
                        </li> -->
                    </ul>
                </div>
                <div class="mt-auto mb-4">
                    <hr>
                    <div class="user nav d-flex nav-item dropdown">
                        <a class="nav-link ps-3 dropdown-toggle fw-semibold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            </div>
        </div>

        <div class="container-fluid col-md-10" style="background-color: #f1f1f1;">
            @yield('content')
        </div>
    </div>
    
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
