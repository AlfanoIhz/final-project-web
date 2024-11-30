@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-dark bg-cover text-white text-center min-vh-100 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('assets/img/caffe.jpg') }}'); background-size: cover; background-position: center;">
        <div class="d-flex h-100 justify-content-center align-items-center">
            <div class="content">
                <img src="{{ asset('assets/img/caffeine-light.png') }}" alt="caffeine" class="mb-4" style="width:auto; height:75px;"> 
                <h1 class="fw-semibold">Welcome</h1>
                <a href="{{ route('user.menu') }}" class="btn btn-light">Find a Table</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about-us" class="container my-5">
        <div class="row pt-4">
            <div class="col-md-6 p-4">
                <img src="{{ asset('assets/img/coffee.jpg') }}" class="img-fluid" style="width:auto; height:100%;" alt="Coffee Image">
            </div>
            <div class="col-md-6">
                <h2>About Us</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.
                </p>
                <p>
                    Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. 
                    Praesent mauris. Fusce nec tellus sed augue semper porta.
                </p>
            </div>
        </div>
    </section>
@endsection
