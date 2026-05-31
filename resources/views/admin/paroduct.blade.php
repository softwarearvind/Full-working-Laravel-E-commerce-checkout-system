<!-- Font Awesome Icons -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

@extends('admin.layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <!-- Top Header -->
    <div class="max-w-7xl mx-auto mb-6">

        <div class="bg-white rounded-3xl shadow-xl p-6 flex flex-col md:flex-row md:items-center md:justify-between">

            <div>
                <h1 class="text-4xl font-extrabold text-gray-800 flex items-center gap-3">
                    <i class="fa-solid fa-gauge-high text-blue-600"></i>
                    Admin Dashboard
                </h1>

                <p class="text-gray-500 mt-2 text-lg">
                    Manage all products easily from one place
                </p>
            </div>

            <!-- Button -->
           <a href="{{ route('product.create') }}"
    class="mt-5 md:mt-0 bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 hover:shadow-2xl transition duration-300 text-white px-6 py-3 rounded-2xl font-bold text-lg flex items-center gap-3 w-fit">

    <i class="fa-solid fa-plus"></i>
    Add Product

</a>

        </div>

    </div>



    <!-- Product Table -->
    <div class="max-w-7xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden">

        <!-- Table Header -->
        <div class="p-6 border-b bg-gradient-to-r from-blue-600 to-indigo-600">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <h2 class="text-3xl font-bold text-white flex items-center gap-3">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Product List
                    </h2>

                    <p class="text-blue-100 mt-1">
                        All products information
                    </p>
                </div>

                <!-- Search -->
                <div class="relative">

                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-4 text-white"></i>

                    <input type="text"
                        placeholder="Search products..."
                        class="w-full md:w-80 bg-white/20 placeholder-white text-white border border-white/30 rounded-2xl pl-12 pr-5 py-3 focus:outline-none focus:ring-2 focus:ring-white">

                </div>

            </div>

        </div>

        <!-- Table -->
     <!-- Table -->
<div class="overflow-x-auto rounded-2xl">

    <table class="w-full min-w-[1100px] lg:min-w-full table-auto">

        <!-- Head -->
        <thead class="bg-gradient-to-r from-slate-100 to-slate-200">

            <tr>

                <th class="px-6 py-4 text-left text-gray-700 font-bold">
                    ID
                </th>

                <th class="px-6 py-4 text-left text-gray-700 font-bold">
                    Image
                </th>

                <th class="px-6 py-4 text-left text-gray-700 font-bold">
                    Category
                </th>

                <th class="px-6 py-4 text-left text-gray-700 font-bold">
                    Brand
                </th>

                <th class="px-6 py-4 text-left text-gray-700 font-bold">
                    Product Name
                </th>

                <th class="px-6 py-4 text-left text-gray-700 font-bold">
                    Price
                </th>

                <th class="px-6 py-4 text-left text-gray-700 font-bold">
                    Status
                </th>

                <th class="px-6 py-4 text-center text-gray-700 font-bold">
                    Action
                </th>

            </tr>

        </thead>

        <!-- Body -->
        <tbody>

            @foreach($products as $key => $product)

            <tr class="border-b border-gray-100 hover:bg-blue-50/60 transition-all duration-300">

                <!-- ID -->
                <td class="px-6 py-5 font-bold text-gray-700">
                    {{ $key + 1 }}
                </td>

                <!-- Image -->
                <td class="px-6 py-5">

                    <img src="{{ asset('products/'.$product->image) }}"
                        class="w-14 h-14 rounded-xl object-cover shadow-lg border border-gray-200 hover:scale-110 transition duration-300">

                </td>

                <!-- Category -->
                <td class="px-6 py-5">

                    <h3 class="font-bold text-gray-800">
                        {{ $product->category->name ?? 'N/A' }}
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $product->category->description ?? 'N/A' }}
                    </p>

                </td>

                <!-- Brand -->
                <td class="px-6 py-5">

                    <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-xl text-sm font-bold">

                        {{ $product->brand->name ?? 'N/A' }}

                    </span>

                </td>

                <!-- Product Name -->
                <td class="px-6 py-5">

                    <h3 class="font-bold text-gray-800 text-base">
                        {{ $product->name ?? 'N/A' }}
                    </h3>

                </td>

                <!-- Price -->
                <td class="px-6 py-5">

                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl font-bold text-sm">

                        ₹ {{ $product->price ?? '0' }}

                    </span>

                </td>

                <!-- Status -->
                <td class="px-6 py-5">

                    <span class="{{ $product->status == 'Active'
                        ? 'bg-green-100 text-green-700'
                        : 'bg-red-100 text-red-700' }}

                        px-4 py-2 rounded-full text-sm font-bold">

                        {{ $product->status }}

                    </span>

                </td>

                <!-- Action -->
                <td class="px-6 py-5 text-center">

                    <div class="flex justify-center gap-2">

                        <!-- Edit -->
                        <a href="#"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-xl font-semibold shadow transition duration-300 flex items-center gap-2 text-sm">

                            <i class="fa-solid fa-pen-to-square"></i>

                           

                        </a>

                        <!-- Delete -->
                        <button
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl font-semibold shadow transition duration-300 flex items-center gap-2 text-sm">

                            <i class="fa-solid fa-trash"></i>

                           

                        </button>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>
<div class="p-6 bg-white border-t">

    {{ $products->links() }}

</div>

    </div>

</div>

@endsection