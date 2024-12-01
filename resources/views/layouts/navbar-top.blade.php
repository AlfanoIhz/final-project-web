<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100" style="z-index: 2">
    <div class="container-fluid mx-4">
        <a href="{{ route('landing-page') }}" class="logo">
            <img src="{{ asset('assets/img/caffeine.png') }}" alt="caffeine" class="" style="width:100%; height:35px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse fw-semibold navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.menu') }}">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                @if (!auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login-form') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); confirmLogout();">
                            Logout <i class="bi bi-box-arrow-right"></i>
                        </a>
                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script>
    function confirmLogout() {
        if (confirm('Are you sure you want to logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
</script>