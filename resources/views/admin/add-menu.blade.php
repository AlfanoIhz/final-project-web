@extends('layouts.admin')

@section('content')
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