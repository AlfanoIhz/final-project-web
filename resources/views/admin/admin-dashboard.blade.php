@extends('layouts.admin')

@section('content')
    <div class="row vh-100">
        @foreach ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="{{ asset('upload/menus-img/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->menu_name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $menu->menu_name }}</h5>
                        <p class="card-text">{{ $menu->description }}</p>
                        <p class="card-text fw-bold">${{ number_format($menu->price, 2) }}</p>
                        @if($menu->isAvailable)
                            <form action="{{ route('menu.addToOrder', $menu->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Add to Order</button>
                            </form>
                        @else
                            <button class="btn btn-secondary" disabled>Out of Stock</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
