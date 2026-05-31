@extends('admin.layouts.app')

@section('content')

<h2>Admin Dashboard</h2>

<div class="container mt-4">

    <h2>Admin Order Dashboard</h2>

    <table class="table table-bordered table-hover mt-3">

        <thead class="table-dark">
            <tr>
                <th>Order No</th>
                <th>User</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($order as $order)

            <tr>

                <td>{{ $order->order_no }}</td>

                <td>{{ $order->name }}</td>

                <td>₹{{ $order->grand_total }}</td>

                <td>
                    <span class="badge bg-info">
                        {{ $order->payment_method }}
                    </span>
                </td>

                <td>
                    <span class="badge bg-warning">
                        {{ $order->order_status }}
                    </span>
                </td>

                <td>
                    <a href=""
                       class="btn btn-primary btn-sm">

                        View

                    </a>
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection