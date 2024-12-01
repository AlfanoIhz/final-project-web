@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-dark bg-cover text-white text-center min-vh-100 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('assets/img/caffe.jpg') }}'); background-size: cover; background-position: center;">
        <div class="d-flex h-100 justify-content-center align-items-center">
            <div class="content">
                <img src="{{ asset('assets/img/caffeine-lg-light.png') }}" alt="caffeine" class="mb-4" style="width:auto; height:150px;"> 
                <h1 class="fw-semibold">Welcome !</h1>
                <a href="{{ route('user.menu') }}" class="btn" style="background-color: #E3DAC9; color: #000; border: none; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                    Find a Table
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container my-5" style="display: flex; position: relative;">
            <div class="row p-4 d-flex">
                <div class="image-container col-md-6" style="flex: 1;">
                    <img src="{{ asset('assets/img/coffee.jpg') }}" alt="Your Image" class="img-fluid rounded" style="width: auto; height: 100%;">
                </div>
                <div class="text-container rounded mt-4 me-4 justify-content-center" 
                     style="flex: 1; position: relative; margin-left: -10%; z-index: 1; background-color: #E3DAC9; padding: 20px; width: 200px; height: 500px;">
                    <h2>About Us</h2>
                        <p>
                            Welcome to Caffeine, a place where our love for quality coffee meets a warm and 
                            cozy atmosphere. Located in the heart of the city, we are committed to serving a 
                            variety of freshly brewed coffee options.
                        </p>
                        <p>
                            At Caffeine, we believe that coffee is an art. We source the finest coffee beans from 
                            local roasters as well as from all around the world, ensuring every cup we serve 
                            offers an extraordinary experience. Whether you're looking for a cozy corner to 
                            relax with a book or a lively spot to meet friends, our cafe provides the perfect ambiance.
                        </p>
                        <p>
                            Our mission is simple: to bring people together through exceptional coffee and 
                            warm conversations. With a friendly atmosphere, a creative menu, and a focus on 
                            quality, we strive to create an experience that makes you feel right at home.
                        </p>
                        <p>
                            Come and enjoy the best of coffee culture with us. We can't wait to welcome you!
                        </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <p class="text-center text-muted mb-5">
                Have questions or want to get in touch? We’d love to hear from you!
            </p>
            <div class="row">
                <!-- Contact Form -->
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Write your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark w-100" style="background-color: #E3DAC9; color: #000;">
                            Send Message
                        </button>
                    </form>
                </div>
                <!-- Contact Info -->
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h4>Our Address</h4>
                        <p>
                            Caffeine Coffee Shop  
                            Jl. Siliwangi No. 10,  
                            Kelurahan Kemiling,  
                            Kecamatan Kemiling,  
                            Bandar Lampung, Lampung 35151  
                            Near Universitas Lampung  
                            Indonesia
                        </p>
                        <h4>Email</h4>
                        <p>
                            caffeine@gmail.com
                        </p>
                        <h4>Phone</h4>
                        <p>
                            +6282345677777
                        </p>
                        <h4>Follow Us</h4>
                        <div>
                            <a href="#" class="me-2 text-dark"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="me-2 text-dark"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection