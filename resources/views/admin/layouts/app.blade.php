<!DOCTYPE html>
<html>
<head>

    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- Sidebar -->

        <div class="col-md-2 bg-dark text-white min-vh-100 p-3">

            <h3 class="mt-3">
                <i class="bi bi-shop"></i> Admin Panel
            </h3>

            <ul class="nav flex-column mt-4">

                <li class="nav-item mb-2">

                    <a href="{{ url('/admin/dashboard') }}" class="nav-link text-white">

                        <i class="bi bi-speedometer2"></i>
                        Dashboard

                    </a>

                </li>

                <li class="nav-item mb-2">

                    <a href="" class="nav-link text-white">

                        <i class="bi bi-grid"></i>
                        Categories

                    </a>

                </li>

                <li class="nav-item mb-2">

                    <a href="{{ route('product.view')}}" class="nav-link text-white">

                        <i class="bi bi-box-seam"></i>
                        Products

                    </a>

                </li>

                <li class="nav-item mb-2">

                    <a href="" class="nav-link text-white">

                        <i class="bi bi-people"></i>
                        Vendors

                    </a>

                </li>

                <li class="nav-item mb-2">

                    <a href="{{ route('admin.orders')}}" class="nav-link text-white">

                        <i class="bi bi-cart"></i>
                        Orders

                    </a>

                </li>

                <li class="nav-item mt-3">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="btn btn-danger w-100">

                            <i class="bi bi-box-arrow-right"></i>
                            Logout

                        </button>

                    </form>

                </li>

            </ul>

        </div>

        <!-- Main Content -->

        <div class="col-md-10 p-4">

            @yield('content')

        </div>

    </div>

</div>

</body>
</html>