<div>
    <input type="text" wire:model="searchPhone" placeholder="Search by Phone Number">
    <input type="text" wire:model="searchName" placeholder="Search by Client Name">

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Client Name</th>
                <th>Phone Number</th>
                <th>Product Code</th>
                <th>Final Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->client_name }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->product_code }}</td>
                    <td>{{ $order->final_price }}</td>
                    <td>{{ $order->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
