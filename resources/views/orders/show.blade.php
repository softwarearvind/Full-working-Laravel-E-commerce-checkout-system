<!DOCTYPE html>
<html lang="en">
<head>
    @include('navbar')

</head>

<body>

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">
        <h1 class="fw-bold">Laravel 12 Ecommerce</h1>
        <p class="mb-3">Discover Amazing Products at Best Prices</p>

        <a href="#orders" class="btn btn-warning btn-lg px-4 rounded-pill">
            My Orders
        </a>
    </div>
</section>

<!-- Orders Section -->
<div class="container mt-4">

    <h2>Order Details</h2>

    <div class="card mb-4">

        <div class="card-body">

            <h5>Order No: {{ $order->order_no }}</h5>

            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>

            <p><strong>Address:</strong>
                {{ $order->address }},
                {{ $order->city }},
                {{ $order->state }},
                {{ $order->pincode }}
            </p>

            <p><strong>Payment:</strong> {{ $order->payment_method }}</p>

            <p>
                <strong>Status:</strong>
                <span class="badge bg-info">
                    {{ $order->order_status }}
                </span>
            </p>

        </div>

    </div>

    <h4>Products</h4>

    <table class="table table-bordered">

        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>

            @php $total = 0; @endphp

            @foreach($order->items as $item)

            @php
                $subtotal = $item->price * $item->quantity;
                $total += $subtotal;
            @endphp

            <tr>

                <td>
                    <img src="{{ asset('products/'.$item->product->image) }}"
                         width="60">
                </td>

                <td>{{ $item->product->name }}</td>

                <td>₹{{ $item->price }}</td>

                <td>{{ $item->quantity }}</td>

                <td>₹{{ $subtotal }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <h4 class="text-end">
        Grand Total: ₹{{ $total }}
    </h4>

    <a href="{{ route('order.invoice', $order->id) }}"
   class="btn btn-danger btn-sm">

   Download Invoice PDF

</a>

</div>

<br>
<br>

<!-- Offer Section -->
<section class="offer-section text-white text-center py-5">

    <div class="container">

        <h2 class="fw-bold mb-2">50% OFF On New Collection</h2>
        <p class="mb-3">Limited Time Offer - Hurry Up!</p>

        <a href="#" class="btn btn-warning btn-lg px-4 rounded-pill">
            Buy Now
        </a>

    </div>

</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p class="mb-0">
            © 2026 Laravel Ecommerce Website | Developed By Arvind
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>