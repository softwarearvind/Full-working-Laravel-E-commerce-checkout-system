<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuantumQuik Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body{
            background:#f8fafc;
            font-family:'Segoe UI',sans-serif;
        }

      

        .hero{
            background:linear-gradient(135deg,#0f172a,#2563eb);
            color:white;
            padding:120px 0;
        }

        .hero h1{
            font-size:60px;
            font-weight:800;
        }

        .hero p{
            font-size:22px;
        }

        .category-box{
            background:#fff;
            border-radius:20px;
            padding:30px;
            text-align:center;
            transition:.4s;
            border:1px solid #e5e7eb;
            height:100%;
        }

        .category-box i{
            color:#2563eb;
            transition:.4s;
        }

        .category-box:hover{
            transform:translateY(-10px);
            background:#2563eb;
            color:#fff;
        }

        .category-box:hover i{
            color:#fff;
        }

        .product-card{
            border:none;
            border-radius:20px;
            overflow:hidden;
            transition:.4s;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .product-card:hover{
            transform:translateY(-10px);
            box-shadow:0 15px 35px rgba(0,0,0,.15);
        }

        .product-card img{
            height:250px;
            object-fit:cover;
        }

        .price{
            color:#16a34a;
            font-size:22px;
            font-weight:700;
        }

        .old-price{
            text-decoration:line-through;
            color:#dc2626;
            font-size:14px;
        }

        .btn-cart{
            width:45px;
            height:45px;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .offer-section{
            background:linear-gradient(135deg,#0f172a,#2563eb);
        }

        footer{
            background:#0f172a;
            color:white;
            padding:30px 0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav style="background:#0f172a; padding:0 2rem; display:flex; align-items:center; justify-content:space-between; height:64px; font-family:'Segoe UI',sans-serif; position:sticky; top:0; z-index:1000; box-shadow:0 1px 0 rgba(255,255,255,0.06);">

    {{-- Brand --}}
    <a href="#" style="display:flex; align-items:center; gap:10px; color:#fff; font-size:18px; font-weight:700; text-decoration:none; letter-spacing:-0.3px;">
        <i class="fa-solid fa-store" style="color:#3b82f6; font-size:20px;"></i>
        QuantumQuik Shop
    </a>

    {{-- Nav links + auth --}}
    <div style="display:flex; align-items:center; gap:4px;">
        <a href="#"      style="color:#94a3b8; font-size:14px; padding:6px 12px; border-radius:8px; text-decoration:none; transition:background .2s, color .2s;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='#fff'" onmouseout="this.style.background='';this.style.color='#94a3b8'">Home</a>
        <a href="#products" style="color:#94a3b8; font-size:14px; padding:6px 12px; border-radius:8px; text-decoration:none;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='#fff'" onmouseout="this.style.background='';this.style.color='#94a3b8'">Products</a>
        <a href="#"      style="color:#94a3b8; font-size:14px; padding:6px 12px; border-radius:8px; text-decoration:none;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='#fff'" onmouseout="this.style.background='';this.style.color='#94a3b8'">Categories</a>
        <a href="#"      style="color:#94a3b8; font-size:14px; padding:6px 12px; border-radius:8px; text-decoration:none;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='#fff'" onmouseout="this.style.background='';this.style.color='#94a3b8'">Contact</a>

        <div style="width:1px; height:20px; background:rgba(255,255,255,.1); margin:0 8px;"></div>

        @auth
            @if(Auth::user()->role == 'customer')
                {{-- Avatar + name --}}
                <div style="display:flex; align-items:center; gap:8px; margin-right:6px;">
                    <div style="width:28px; height:28px; border-radius:50%; background:#2563eb; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:600; color:#fff;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                   <span style="color:#e2e8f0; font-size:14px;">
                  {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                </span>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" style="background:transparent; border:0.5px solid rgba(255,255,255,.2); color:#94a3b8; font-size:13px; padding:5px 12px; border-radius:8px; cursor:pointer;">
                        Logout
                    </button>
                </form>

                <a href="{{ route('orders.index')}}" style="color:#94a3b8; font-size:14px; padding:6px 12px; border-radius:8px; text-decoration:none;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='#fff'" onmouseout="this.style.background='';this.style.color='#94a3b8'">My Oder</a>
            @endif
        @endauth

        @guest
            <a href="{{ route('register') }}" style="border:0.5px solid rgba(255,255,255,.25); color:#e2e8f0; font-size:13px; padding:6px 14px; border-radius:8px; text-decoration:none; margin-right:4px;">Register</a>
            <a href="{{ route('login') }}"    style="background:#2563eb; color:#fff; font-size:13px; font-weight:500; padding:6px 16px; border-radius:8px; text-decoration:none;">Login</a>
        @endguest

        {{-- Cart icon --}}
        @php $cartCount = \App\Models\Cart::where('user_id', auth()->id())->count(); @endphp
        <a href="{{ route('cart.index') }}" aria-label="Cart" style="position:relative; display:flex; align-items:center; justify-content:center; width:38px; height:38px; border-radius:10px; background:rgba(255,255,255,.06); border:0.5px solid rgba(255,255,255,.12); color:#e2e8f0; text-decoration:none; margin-left:8px;">
            <i class="fa-solid fa-cart-shopping" style="font-size:16px;"></i>
            @if($cartCount > 0)
                <span style="position:absolute; top:-5px; right:-5px; background:#ef4444; color:#fff; font-size:10px; font-weight:700; width:17px; height:17px; border-radius:50%; display:flex; align-items:center; justify-content:center; border:2px solid #0f172a;">
                    {{ $cartCount }}
                </span>
            @endif
        </a>
    </div>
</nav>
