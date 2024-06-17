<!-- resources/views/livewire/admin-orders-component.blade.php -->

<div>
    <h2>Admin Orders Dashboard</h2>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Total</th>
                <th>Items</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->total }}</td>
                    <td>
                        <ul>
                            @foreach ($order->orderItems as $item)
                                <li>{{ $item->product->name }} ({{ $item->quantity }})</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
