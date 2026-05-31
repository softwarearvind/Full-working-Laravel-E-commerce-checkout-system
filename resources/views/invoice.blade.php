<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>

    <style>
        body {
            font-family: Arial;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .box {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>My Shop Invoice</h2>
    <p>Order No: {{ $order->order_no }}</p>
</div>

<div class="box">
    <p><strong>Name:</strong> {{ $order->name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Phone:</strong> {{ $order->phone }}</p>

    <p>
        <strong>Address:</strong>
        {{ $order->address }},
        {{ $order->city }},
        {{ $order->state }},
        {{ $order->pincode }}
    </p>

    <p><strong>Payment:</strong> {{ $order->payment_method }}</p>
    <p><strong>Status:</strong> {{ $order->order_status }}</p>
</div>

<table>

    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>

        @php $grandTotal = 0; @endphp

        @foreach($order->items as $item)

        @php
            $total = $item->price * $item->quantity;
            $grandTotal += $total;
        @endphp

        <tr>
            <td>{{ $item->product->name }}</td>
            <td>₹{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>Rs{{ $total }}</td>
        </tr>

        @endforeach

    </tbody>

</table>

<h3 class="text-right">
    Grand Total: Rs{{ $grandTotal }}
</h3>

</body>
</html>