    @extends('layouts.user-layout')

    @section('content')
    <div class="row vh-100">
        <!-- Menu Content -->
        <div class="col-md-9 p-4" style="overflow-y: auto; max-height: 100vh;">
            <div class="sticky-top shadow bg-white mb-4 rounded">
                <form class="d-flex form-floating" role="search" id="searchForm" method="GET" action="{{ route('user.menu') }}">
                    <input type="search" class="form-control" id="searchInput" name="searchInput" placeholder="Find what you want..." value="{{ old('searchInput', request('searchInput')) }}">
                    <label for="searchInput">Find what you want...</label>
                </form>
            </div>
            
            <!-- Menu Items --> 
            <div class="row">
                @foreach ($menus as $menu)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow">
                            @if ($menu->image)
                                <img src="{{ asset('upload/menus-img/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->menu_name }}">
                            @else
                                <img src="{{ asset('assets/img/Caffeine-default.png') }}" class="card-img-top" alt="{{ $menu->menu_name }}">
                            @endif
                            <div class="card-body text-center d-flex flex-column" style="height: 100%;">
                                <h5 class="card-title text-center fw-semibold">{{ $menu->menu_name }}</h5>
                                <div class="menu-detail mb-2 d-flex flex-column flex-grow-1">
                                    <p class="card-text text-center menu-description">{{ $menu->description }}</p>
                                </div>
                                <p class="card-text text-start fw-semibold mb-2">{{ number_format($menu->price, 2) }}</p>
                                <div class="btn-order mt-auto">
                                    @if($menu->isAvailable)
                                        <!-- Form to add item to order -->
                                        <form action="{{ route('menu.addToOrder', $menu->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark">Add to Order</button>
                                        </form>
                                    @else
                                        <button class="btn btn-outline-dark" disabled>Out of Stock</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-md-3 d-flex flex-column bg-white p-4" style="max-height: 100vh;">
            <h5 class="mb-1">Your Order</h5>
            <hr>
            <!-- Order Items -->
            <div class="order-list flex-grow-1 overflow-auto mt-1" style="max-height: 70vh;">
                @php
                    $orderSession = session()->get('order', []);
                @endphp
                @foreach ($orderSession as $id => $order)
                    <div class="d-flex justify-content-between align-items-center mb-2 p-2 border rounded">
                        <div>
                            <h6 class="mb-0">{{ $order['name'] }}</h6>
                            <div class="item-count mt-1">
                                <!-- Decrease order quantity -->
                                <form action="{{ route('menu.decreaseFromOrder', $id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn count-btn btn-outline-dark" type="submit"><i class="bi bi-dash"></i></button>
                                </form> 

                                <input type="text" class="form-control text-center input-size" value="{{ $order['quantity'] }}" readonly>

                                <!-- Increase order quantity -->
                                <form action="{{ route('menu.addToOrder', $id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn count-btn btn-outline-dark" type="submit"><i class="bi bi-plus"></i></button>
                                </form>                          
                            </div>
                        </div>
                        <span class="fw-bold">{{ number_format($order['price'] * $order['quantity'], 2) }}</span>
                    </div>
                @endforeach
            </div>
            <hr>

            <!-- Order Total at Bottom -->
            <div class="mt-auto">
                <div class="d-flex justify-content-between mb-3">
                    <h5>Total:</h5>
                    @if($total > 0)
                        <h5>Rp.{{ number_format($total, 2) }}</h5>
                    @else
                        <h5></h5>
                    @endif
                </div>

                <!-- Place Order Form -->
                <form action="{{ route('order.place') }}" method="POST">
                    @csrf


                    <!-- Change the name to match the validation in the controller -->
                    <input type="hidden" name="total_price" value="{{ $total }}">

                    <button class="btn btn-primary w-100" type="submit">Place Order</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
