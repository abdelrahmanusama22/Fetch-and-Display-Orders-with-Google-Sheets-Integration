<?php

// app/Http/Livewire/Orders.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class Orders extends Component
{
    public $searchPhone = '';
    public $searchName = '';

    public function render()
    {
        $orders = Order::query()
            ->when($this->searchPhone, function ($query) {
                $query->where('phone_number', 'like', '%' . $this->searchPhone . '%');
            })
            ->when($this->searchName, function ($query) {
                $query->where('client_name', 'like', '%' . $this->searchName . '%');
            })
            ->get();

        return view('livewire.orders', ['orders' => $orders]);
    }
}
