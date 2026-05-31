@extends('admin.layouts.app')

@section('content')

<h2>Admin Dashboard</h2>

<div class="row mt-4">

    <div class="col-md-3">

        <div class="card bg-primary text-white">

            <div class="card-body">

                <h4>Total Products</h4>

                <h2>100</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-success text-white">

            <div class="card-body">

                <h4>Total Orders</h4>

                <h2>50</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-warning text-white">

            <div class="card-body">

                <h4>Total Vendors</h4>

                <h2>20</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-danger text-white">

            <div class="card-body">

                <h4>Total Sales</h4>

                <h2>₹50000</h2>

            </div>

        </div>

    </div>

</div>

@endsection