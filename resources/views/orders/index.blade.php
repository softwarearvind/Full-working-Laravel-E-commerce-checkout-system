<!DOCTYPE html>
<html lang="en">
<head>
    @include('navbar')

    <style>
        body {
            background: #f8f9fa;
        }

        .page-title {
            font-weight: 700;
            margin-bottom: 25px;
        }

        .order-card {
            border: none;
            border-radius: 16px;
            transition: 0.3s;
        }

        .order-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .badge-status {
            font-size: 12px;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .hero {
            background: linear-gradient(135deg,#0d6efd,#6610f2);
            color: white;
            padding: 60px 0;
            border-radius: 0 0 30px 30px;
        }

        .offer-section {
            background: linear-gradient(135deg,#198754,#20c997);
        }
    </style>
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
<div class="container py-5" id="orders">

    <h2 class="page-title">🧾 My Orders</h2>

    <div class="row">

        @forelse($orders as $order)

            <div class="col-md-6 col-lg-4 mb-4">

                <div class="card order-card shadow-sm">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0 fw-bold">
                                Order #{{ $order->order_no }}
                            </h6>

                            <span class="badge bg-warning text-dark badge-status">
                                {{ ucfirst($order->order_status) }}
                            </span>
                        </div>

                        <hr>

                        <p class="mb-1">
                            💰 <strong>Total:</strong> ₹{{ $order->grand_total }}
                        </p>

                        <p class="mb-1">
                            💳 <strong>Payment:</strong> {{ $order->payment_method }}
                        </p>

                        <p class="mb-3 text-muted small">
                            📅 {{ $order->created_at->format('d M Y, h:i A') }}
                        </p>

                        <a href="{{ route('orders.show', $order->id) }}"
                           class="btn btn-primary btn-sm w-100 rounded-pill">

                            View Details

                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center py-5">

                <div class="alert alert-info rounded-pill d-inline-block px-4">
                    🚫 No orders found yet
                </div>

            </div>

        @endforelse

    </div>
</div>

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