
<!DOCTYPE html>
<html lang="en">
<head>
@include ('navbar')

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">

        <h1>Laravel 12 Ecommerce</h1>

        <p>Discover Amazing Products at Best Prices</p>

        <a href="#products" class="btn btn-warning btn-lg px-5 rounded-pill mt-3">
           Cart
        </a>

    </div>
</section>



<!-- Categories -->


<div class="container mt-4">

    <h2>My Cart</h2>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>

            @php $grandTotal = 0; @endphp

            @foreach($carts as $cart)

            @php
                $total = $cart->price * $cart->quantity;
                $grandTotal += $total;
            @endphp

            <tr>

                <td>
                    <img src="{{ asset('products/'.$cart->product->image) }}"
     width="80"
     alt="{{ $cart->product->name }}">
                </td>

                <td>{{ $cart->product->name }}</td>

                <td>₹{{ $cart->price }}</td>

                <td>{{ $cart->quantity }}</td>

                <td>₹{{ $total }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <h4 class="text-end">
        Grand Total : ₹{{ $grandTotal }}
    </h4>

    <div class="text-end">
    <a href="{{ route('checkout') }}"
       class="btn btn-success">
        Proceed To Checkout
    </a>
</div>

</div>
<br>





<!-- Products -->


<!-- Offer Section -->
<section class="offer-section text-white text-center py-5">

    <div class="container">

        <h2 class="fw-bold mb-3">
            50% OFF On New Collection
        </h2>

        <p>Limited Time Offer - Hurry Up!</p>

        <a href="#" class="btn btn-warning btn-lg px-5 rounded-pill">
            Buy Now
        </a>

    </div>

</section>

<!-- Footer -->
<footer>
    <div class="container text-center">

        <p class="mb-0">
            © 2026 Laravel Ecommerce Website | Developed By Arvind
        </p>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
