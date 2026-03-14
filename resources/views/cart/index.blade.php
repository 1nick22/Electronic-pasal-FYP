@extends('layouts.app')

@section('title', 'Your Cart – ElectronicPasal')

@section('content')
<!-- Add Bootstrap CSS specifically for the cart page as requested -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-5" style="min-height: 60vh;">
    <h2 class="mb-4 fw-bold">Shopping Cart</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($cartItems->isEmpty())
        <div class="text-center py-5 bg-light rounded shadow-sm border">
            <h3 class="text-muted mb-4">Your cart is empty</h3>
            <a href="{{ route('product.index') }}" class="btn btn-primary btn-lg px-5 rounded-pill">Continue Shopping</a>
        </div>
    @else
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="ps-4">Product Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col" style="width: 140px;">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col" class="text-end pe-4">Remove Button</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td class="ps-4 py-3">
                                                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="img-thumbnail" style="width: 70px; height: 70px; object-fit: contain;">
                                            </td>
                                            <td class="py-3">
                                                <a href="{{ route('product.show', $item->product->id) }}" class="text-decoration-none text-dark fw-bold">{{ $item->product->name }}</a>
                                                @if($item->product->brand)
                                                    <div class="text-muted small">{{ $item->product->brand }}</div>
                                                @endif
                                            </td>
                                            <td class="py-3 text-muted">Rs. {{ number_format($item->price, 2) }}</td>
                                            <td class="py-3">
                                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center mb-0">
                                                    @csrf
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm text-center me-2" style="width: 65px;" required>
                                                    <button type="submit" class="btn btn-sm btn-outline-primary" title="Update Cart">
                                                        Update Cart
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="py-3 fw-bold">Rs. {{ number_format($item->price * $item->quantity, 2) }}</td>
                                            <td class="py-3 text-end pe-4">
                                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="mb-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger text-white" title="Remove Item">
                                                        Remove Item
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title fw-bold border-bottom pb-3 mb-4">Order Summary</h4>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-semibold">Rs. {{ number_format($cartTotal, 2) }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                            <span class="text-muted">Shipping</span>
                            <span class="text-success fw-semibold">Free Delivery</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fs-5 fw-bold">Total Price</span>
                            <span class="fs-5 fw-bold text-primary">Rs. {{ number_format($cartTotal, 2) }}</span>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg fw-bold">Proceed to Checkout</button>
                            <a href="{{ route('product.index') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Bootstrap JS for dismissible alerts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
