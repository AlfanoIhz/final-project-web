<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
    <div class="container-fluid mx-4">
        <a href="{{ route('landing-page') }}" class="logo">
            <img src="{{ asset('assets/img/caffeine.png') }}" alt="caffeine" class="" style="width:100%; height:35px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse fw-semibold navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.login-form') }}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>