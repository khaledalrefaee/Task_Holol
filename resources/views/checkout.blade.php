@extends('layouts.site')

@section('content')

<div class="container">
    <h2>Checkout</h2>
    <form method="POST" action="{{ route('cart.confirm') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
        
            <label for="address">Address:</label>
            <textarea name="address" id="address" class="form-control" required></textarea>
        </div>
        @if(auth()->check())
        <button type="submit" class="btn btn-primary">Confirm Purchase</button>
    @else
        <p>You must be logged in to confirm your purchase.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    @endif
    </form>
</div>
@endsection