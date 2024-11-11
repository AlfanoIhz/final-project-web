@extends('layouts.user-layout')

@section('content')
<div class="row vh-100">
    <!-- Menu Content -->
    <div class="col-md-8 p-4" style="overflow-y: auto; max-height: 100vh;">
        <input type="text" class="form-control mb-4" placeholder="Search Product...">
        <div class="d-flex justify-content-evenly mb-3">
            <button class="btn btn-outline-brown">All</button>
            <button class="btn btn-outline-brown">Breakfast</button>
            <button class="btn btn-outline-brown">Coffee</button>
            <button class="btn btn-outline-brown">Milk</button>
        </div>
        
        <!-- Menu Items --> 
        <div class="col">
            
        </div>
    </div>
</div>
@endsection
