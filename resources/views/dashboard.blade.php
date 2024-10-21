@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero bg-dark text-white text-center" style="background-image: url('{{ asset('assets/img/caffe.jpg') }}'); background-size: cover; height: 500px;">
        <div class="d-flex h-100 justify-content-center align-items-center">
            <div class="content">
                <h1>Welcome</h1>
                <a href="#find-table" class="btn btn-primary">Find a Table</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about-us" class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/img/coffee.jpg') }}" class="img-fluid" alt="Coffee Image">
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
