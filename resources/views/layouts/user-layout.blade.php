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
            color: #8B4513; 
            border-radius: 10px;
        }
        .nav-link.active {
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.4);
        }

        .nav-link.active, .nav-link:hover {
            background-color: #8B4513; 
            color: white !important; 
            border-radius: 10px;
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
        <h3 class="text-center mb-4" style="color: #8B4513; text-shadow: 1px 1px 2px">Caffeine</h3>
        <ul class="nav flex-column">
            <li class="nav-item mb-3"><a href="#" class="nav-link">Menu</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Table Services</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Reservation</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Accounting</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Settings</a></li>
        </ul>
        </div>

        <div class="container-fluid col-md-10" style="background-color: #f1f1f1;">
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
