
<!DOCTYPE html>
<html lang="en">

@include ('navbar')

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">

        <h1>Laravel 12 Ecommerce</h1>

        <p>Discover Amazing Products at Best Prices</p>

        <a href="#products" class="btn btn-warning btn-lg px-5 rounded-pill mt-3">
           {{ $product->name }}
        </a>

    </div>
</section>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Categories -->

<div class="container py-5">

    <div class="row g-5">

        <!-- Product Image -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">

                    <img src="{{ asset('products/'.$product->image) }}"
                         alt="{{ $product->name }}"
                         class="img-fluid rounded-4"
                         style="max-height:500px;object-fit:contain;">

                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-6">

            <h1 class="fw-bold mb-3">
                {{ $product->name }}
            </h1>

            <div class="mb-3">
                <span class="badge bg-success fs-6 px-3 py-2">
                    In Stock
                </span>
            </div>

            <h2 class="text-danger fw-bold mb-4">
                ₹{{ number_format($product->price,2) }}
            </h2>

            <hr>

            <h5 class="fw-bold">Description</h5>

            <p class="text-muted fs-5">
                {{ $product->description }}
            </p>

            <hr>

            <!-- Quantity -->
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="row align-items-center mb-4">

                    <div class="col-md-4">
                        <label class="form-label fw-bold">
                            Quantity
                        </label>

                        <input type="number"
                               name="quantity"
                               value="1"
                               min="1"
                               class="form-control">
                    </div>

                </div>

                <!-- Buttons -->
                <div class="d-flex gap-3">

                    <button type="submit"
                            class="btn btn-warning btn-lg px-4">
                        <i class="fas fa-cart-plus"></i>
                        Add To Cart
                    </button>

                    <button type="button"
                            class="btn btn-success btn-lg px-4">
                        <i class="fas fa-bolt"></i>
                        Buy Now
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



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
