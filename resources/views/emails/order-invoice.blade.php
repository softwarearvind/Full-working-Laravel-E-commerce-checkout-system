<!DOCTYPE html>
<html>
<head>
    <title>Order Invoice</title>
</head>

<body style="font-family: Arial; background:#f4f4f4; padding:20px;">

<div style="max-width:600px;margin:auto;background:#fff;padding:20px;border-radius:10px;">

    <h2 style="text-align:center;color:#28a745;">
        🎉 Thank You for Your Order
    </h2>

    <hr>

    <p><strong>Order No:</strong> {{ $order->order_no }}</p>
    <p><strong>Name:</strong> {{ $order->name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Phone:</strong> {{ $order->phone }}</p>

    <p>
        <strong>Address:</strong><br>
        {{ $order->address }},
        {{ $order->city }},
        {{ $order->state }} - {{ $order->pincode }}
    </p>

    <hr>

    <h3>Order Summary</h3>

    <table width="100%" border="1" cellspacing="0" cellpadding="8">

        <thead style="background:#eee;">
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
                    <td>₹{{ $total }}</td>
                </tr>

            @endforeach

        </tbody>

    </table>

    <h3 style="text-align:right;margin-top:10px;">
        Grand Total: ₹{{ $grandTotal }}
    </h3>

    <hr>

    <p style="text-align:center;color:gray;">
        Thanks for shopping with us ❤️
    </p>

</div>

</body>
</html>