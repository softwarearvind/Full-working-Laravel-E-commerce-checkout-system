<!DOCTYPE html>
<html lang="en">

<head>
    @include('navbar')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .hero {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: #fff;
            padding: 60px 0;
        }

        .checkout-card {
            border-radius: 18px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .table thead {
            background: #0d6efd;
            color: #fff;
        }

        .summary-box {
            background: #fff;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-place {
            border-radius: 30px;
            padding: 12px;
            font-weight: 600;
        }

        .payment-box {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        footer {
            background: #111;
            color: #aaa;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>

<body>

<!-- HERO -->
<section class="hero text-center">
    <div class="container">
        <h1 class="fw-bold">Laravel 12 Ecommerce</h1>
        <p class="mb-3">Secure Checkout & Fast Delivery</p>

        <a href="#checkout" class="btn btn-warning btn-lg px-5 rounded-pill">
            Go to Checkout
        </a>
    </div>
</section>

<!-- CHECKOUT SECTION -->
<div class="container py-5" id="checkout">

    <div class="row g-4">

        <!-- CART TABLE -->
        <div class="col-lg-7">

            <div class="card checkout-card p-3">

                <h4 class="mb-3 fw-bold">Your Cart</h4>

                <div class="table-responsive">

                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td>{{ $cart->product->name }}</td>
                                <td>₹{{ $cart->price }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td class="fw-bold">
                                    ₹{{ $cart->price * $cart->quantity }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <h5 class="text-end fw-bold mt-3">
                    Grand Total: ₹{{ $grandTotal }}
                </h5>

            </div>

        </div>

        <!-- CHECKOUT FORM -->
        <div class="col-lg-5">

            <div class="summary-box">

                <h4 class="fw-bold mb-3">Checkout Details</h4>

                <form action="{{ route('place.order') }}" method="POST">
                    @csrf

                    <input type="text" name="name" class="form-control mb-2" placeholder="Full Name">

                    <input type="email" name="email" class="form-control mb-2" placeholder="Email">

                    <input type="text" name="phone" class="form-control mb-2" placeholder="Phone">

                    <textarea name="address" class="form-control mb-2" placeholder="Full Address"></textarea>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="city" class="form-control mb-2" placeholder="City">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="state" class="form-control mb-2" placeholder="State">
                        </div>
                    </div>

                    <input type="text" name="pincode" class="form-control mb-3" placeholder="Pincode">

                    <h6 class="fw-bold">Payment Method</h6>

                    <div class="payment-box">
                        <label>
                            <input type="radio" name="payment_method" value="cod" checked>
                            Cash On Delivery
                        </label>
                    </div>

                    <div class="payment-box">
                        <label>
                            <input type="radio" name="payment_method" value="online">
                            Online Payment
                        </label>
                    </div>

                    <button class="btn btn-success w-100 btn-place mt-3">
                        Place Order
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- OFFER -->
<section class="text-white text-center py-5" style="background:#0d6efd;">
    <div class="container">
        <h2 class="fw-bold">50% OFF On New Collection</h2>
        <p>Limited Time Offer - Hurry Up!</p>
        <a href="#" class="btn btn-warning btn-lg px-5 rounded-pill">
            Buy Now
        </a>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center">
    <p class="mb-0">© 2026 Laravel Ecommerce Website | Developed By Arvind</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>