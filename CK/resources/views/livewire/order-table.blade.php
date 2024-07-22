<div>
    <input type="text" wire:model="searchTerm" placeholder="Search by phone or client name...">
    
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
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order[0] }}</td>
                    <td>{{ $order[1] }}</td>
                    <td>{{ $order[2] }}</td>
                    <td>{{ $order[3] }}</td>
                    <td>{{ $order[4] }}</td>
                    <td>{{ $order[5] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
