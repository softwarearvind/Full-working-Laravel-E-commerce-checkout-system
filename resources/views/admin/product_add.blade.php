@extends('admin.layouts.app')

@section('content')

<h2>Admin Dashboard</h2>

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-2xl p-8">

        <!-- Heading -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">
                Add Product
            </h1>
            <p class="text-gray-500 mt-2">
                Fill product details below
            </p>
        </div>

        @if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-5">

    {{ session('success') }}

</div>

@endif

        <!-- Form -->
        <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

          <!-- Product Name -->
            <!-- Category Dropdown -->
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Category
                </label>
                <select name="category" class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Select Category</option>
                    @foreach ($cata as  $catagury)
                        
                        <option value="{{$catagury->id}}">{{ $catagury->name}}</option>

                    @endforeach
                    
                    
                </select>
            </div>

             <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Brands
                </label>
                <select name="brand_id" class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Select Brands</option>
                    @foreach ($brand as  $brands)
                        <option value="{{$brands->id}}">{{ $brands->name}}</option>

                    @endforeach
                    
                    
                </select>
            </div>

              <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Product Name
                </label>

                <input type="text"placeholder="Enter Product Name" name="name"  class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500   @error('name')
                border-red-500 focus:ring-red-300
           @else
                border-gray-300 focus:ring-blue-400
           @enderror">
            @error('name')
                <p class="text-red-500 text-sm mt-2 font-medium">
                    {{ $message }}
                </p>
            @enderror

            </div>


            <!-- Price -->
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Price
                </label>

                <input type="number"
                    placeholder="Enter Price"
                    name="price" 
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    @error('price')
                        <p class="text-red-500 text-sm mt-2 font-medium">
                            {{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Quantity -->
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Quantity
                </label>

                <input type="number" name="quantity" 
                    placeholder="Enter Quantity" 
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('quantity')
                        <p class="text-red-500 text-sm mt-2 font-medium">
                            {{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Status Dropdown -->
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Status
                </label>

                <select name="status" class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option>Select Status</option>
                    <option>Active</option>
                    <option>Inactive</option>

                </select>
            </div>

            <!-- Image Upload -->
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    Product Image
                </label>

               <input type="file" name="image">
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    Description
                </label>

                <textarea rows="4"placeholder="Enter Product Description" name="description" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

                 @error('description')
                        <p class="text-red-500 text-sm mt-2 font-medium">
                            {{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg transition duration-300">
                    Save Product
                </button>

                <button type="reset"
                    class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-3 rounded-xl font-semibold shadow-lg transition duration-300">
                    Reset
                </button>

            </div>

        </form>

    </div>

</div>

@endsection