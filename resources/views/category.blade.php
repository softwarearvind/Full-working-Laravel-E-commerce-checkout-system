<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body{
            background:#f8fafc;
        }

        .header{
            background:linear-gradient(135deg,#0f172a,#2563eb);
            color:white;
            padding:60px 0;
        }

        .product-card{
            border:none;
            border-radius:15px;
            overflow:hidden;
            transition:.3s;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .product-card:hover{
            transform:translateY(-8px);
        }

        .product-card img{
            height:230px;
            object-fit:cover;
        }

        .price{
            color:green;
            font-size:20px;
            font-weight:bold;
        }
    </style>
</head>
<body>

<!-- Header -->

<section class="header text-center">
    <div class="container">

        <h1>{{ $category->name }}</h1>

        <p>
            Total Products :
            {{ $products->total() }}
        </p>

        <a href="{{ url('/') }}" class="btn btn-warning">
            <i class="fa fa-arrow-left"></i>
            Back Home
        </a>

    </div>
</section>

<!-- Products -->

<section class="py-5">

    <div class="container">

        <div class="row g-4">

            @forelse($products as $product)

            <div class="col-md-3">

                <div class="card product-card">

                    <img src="{{ asset('products/'.$product->image) }}"
                         class="card-img-top">

                    <div class="card-body">

                        <h5 class="fw-bold">
                            {{ $product->name }}
                        </h5>

                        <p class="text-muted">
                            {{ Str::limit($product->description,50) }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center">

                            <span class="price">
                                ₹{{ $product->price }}
                            </span>

                            <a href="#" class="btn btn-primary">
                                <i class="fa fa-cart-plus"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12 text-center">
                <h4>No Products Found</h4>
            </div>

            @endforelse

        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>

    </div>

</section>

</body>
</html>