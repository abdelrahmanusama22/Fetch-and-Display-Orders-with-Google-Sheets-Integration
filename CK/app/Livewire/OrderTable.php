<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\GoogleSheetService;

class OrderTable extends Component
{
    public $orders = [];
    public $searchTerm = '';

    public function mount(GoogleSheetService $googleSheetService)
    {
        $spreadsheetId = 'YOUR_SPREADSHEET_ID';
        $ordersRange = 'OrderData!A:F'; // Adjust as necessary
        $this->orders = $googleSheetService->fetchOrders($spreadsheetId, $ordersRange);
    }

    public function getFilteredOrdersProperty()
    {
        $term = strtolower($this->searchTerm);
        return array_filter($this->orders, function ($order) use ($term) {
            return stripos($order[2], $term) !== false || stripos($order[1], $term) !== false;
        });
    }

    public function render()
    {
        return view('livewire.order-table', ['orders' => $this->filteredOrders]);
    }
}
