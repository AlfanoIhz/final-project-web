@extends('layouts.user-layout')

@section('content')
<div class="row vh-100">
    <!-- Sidebar -->
    <!--
    <div class="col-md-2 bg-white d-flex flex-column p-3" style="min-width: 15%;">
        <h3 class="text-center mb-4">Caffeine</h3>
        <ul class="nav flex-column">
            <li class="nav-item mb-3"><a href="#" class="nav-link active">Menu</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Table Services</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Reservation</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Accounting</a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link">Settings</a></li>
        </ul>
    </div>
    -->

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
        <div class="row">
            @foreach ($menus as $menu)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $menu->image }}" class="card-img-top" alt="{{ $menu->menu_name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $menu->menu_name }}</h5>
                            <p class="card-text">${{ $menu->description }}</p>
                            <p class="card-text">${{ number_format($menu->price, 2) }}</p>
                            @if($menu->isAvailable)
                                <!-- Form to add item to order -->
                                <form action="{{ route('menu.addToOrder', $menu->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Add to Dish</button>
                                </form>
                            @else
                                <button class="btn btn-secondary" disabled>Out of Stock</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Order Summary -->
    <div class="col-md-4 d-flex flex-column bg-white p-4" style="max-height: 100vh;">
        <h4 class="mb-3">Table 4</h4>
        <hr>
        <!-- Order Items -->
        <div class="order-list flex-grow-1 overflow-auto" style="max-height: 70vh;">
            @foreach ($orders as $order)
                <div class="d-flex justify-content-between align-items-center mb-2 p-2 border rounded">
                    <div>
                        <h6 class="mb-0">{{ $order['name'] }}</h6>
                        <small>${{ number_format($order['price'], 2) }} x {{ $order['quantity'] }}</small>
                    </div>
                    <span class="fw-bold">${{ number_format($order['price'] * $order['quantity'], 2) }}</span>
                </div>
            @endforeach
        </div>
        
        <hr>
        
        <!-- Order Total at Bottom -->
        <div class="mt-auto">
            <div class="d-flex justify-content-between mb-3">
                <h5>Total:</h5>
                <h5>${{ number_format($total, 2) }}</h5>
            </div>
            <button class="btn btn-primary w-100">Place Order</button>
        </div>
    </div>
</div>
@endsection
