
<!DOCTYPE html>
<html lang="en">
<head>
@include ('navbar')

<style>
    .product-card{
    transition:0.4s;
    border-radius:15px;
    overflow:hidden;
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,0.15)!important;
}

.product-image{
    height:250px;
    object-fit:cover;
    transition:0.4s;
}

.product-card:hover .product-image{
    transform:scale(1.08);
}

.card-body{
    padding:20px;
}
</style>

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">

        <h1>QuantumQuik Shop</h1>

        <p>Discover Amazing Products at Best Prices</p>

        <a href="#products" class="btn btn-warning btn-lg px-5 rounded-pill mt-3">
            Shop Now
        </a>

    </div>
</section>

<!-- Categories -->

@php
$icons = [
    'fa-mobile-screen',
    'fa-laptop',
    'fa-shirt',
    'fa-book',
    'fa-futbol',
    'fa-car',
    'fa-house',
    'fa-heart'
];
@endphp

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                <i class="fa-solid fa-layer-group text-primary"></i>
                Top Categories
            </h2>
        </div>

        <div class="row g-4">

            @foreach($cagury as $index => $cata)

                <div class="col-md-3">

                    <div class="category-box">
                      <a href="{{ route('category.products', $cata->id) }}"
                       class="text-decoration-none">

                        <div class="category-box">
                            <i class="fa-solid {{ $icons[$index % count($icons)] }} fa-3x mb-3"></i>
                            <h5>{{ $cata->name }}</h5>
                        </div>

                    </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Products -->
<section class="py-5 bg-light" id="products">

```
<div class="container">

    <!-- Heading -->
    <div class="row mb-5">

        <div class="col-md-6">
            <h2 class="fw-bold">
                <i class="fa-solid fa-fire text-danger"></i>
                Latest Products
            </h2>
            <p class="text-muted">
                Explore our newest arrivals and best deals.
            </p>
        </div>

        <div class="col-md-6 text-md-end">
            <input type="text"
                   class="form-control rounded-pill shadow-sm ms-auto"
                   style="max-width:300px;"
                   placeholder="🔍 Search Products...">
        </div>

    </div>

    <div class="row g-4">

        @foreach($products as $product)

        <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="card border-0 shadow-sm h-100 product-card">

                <div class="position-relative overflow-hidden">

                    <img src="{{ asset('products/'.$product->image) }}"
                         class="card-img-top product-image"
                         alt="{{ $product->name }}">

                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                        Sale
                    </span>

                    <span class="badge bg-success position-absolute top-0 end-0 m-2">
                        New
                    </span>

                </div>

                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold mb-2">

                        <a href="{{ route('product.show', Str::slug($product->name)) }}"
                           class="text-decoration-none text-dark">

                            {{ $product->name }}

                        </a>

                    </h5>

                    <p class="text-muted small flex-grow-1">
                        {{ Str::limit($product->description, 70) }}
                    </p>

                    <div class="mb-3">

                        <span class="text-warning">
                            ★★★★★
                        </span>

                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>

                            <span class="fw-bold text-danger fs-5">
                                ₹{{ $product->price }}
                            </span>

                            <br>

                            <small class="text-decoration-line-through text-muted">
                                ₹99999
                            </small>

                        </div>

                    </div>

                    <form action="{{ route('cart.add') }}" method="POST">

                        @csrf

                        <input type="hidden"
                               name="product_id"
                               value="{{ $product->id }}">

                        <div class="input-group">

                            <input type="number"
                                   name="quantity"
                                   value="1"
                                   min="1"
                                   class="form-control">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fa fa-cart-plus"></i>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $products->links() }}
    </div>

</div>

</section>


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
