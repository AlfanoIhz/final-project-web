<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        <div class="vh-100 col-md-2 bg-white d-flex flex-column p-3" style="min-width: 15%;">
        <h3 class="text-center mb-4">Caffeine</h3>
        <ul class="nav flex-column">
            <li class="nav-item mb-3"><a href="#" class="nav-link active">Dashboard</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Customer</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Customer</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Customer</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Customer</a></li>
        </ul>
        </div>

        <div class="container-fluid col-md-10" style="background-color: #f1f1f1;">
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
