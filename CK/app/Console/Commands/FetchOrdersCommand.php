<?php



namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GoogleSheetService;
use App\Models\Order;

class FetchOrders extends Command
{
    protected $signature = 'orders:fetch';
    protected $description = 'Fetch orders from Google Sheets and store in database';

    protected $googleSheetService;

    public function __construct(GoogleSheetService $googleSheetService)
    {
        parent::__construct();
        $this->googleSheetService = $googleSheetService;
    }

    public function handle()
    {
        $data = $this->googleSheetService->getSheetData(env('1WlC2O1d7U2DiQ54tgqU_CPldYzJeFpZHIT2d7PB3sps'), 'Orders!A2:F');
        foreach ($data as $row) {
            Order::updateOrCreate(
                ['order_id' => $row[0]],
                [
                    'client_name' => $row[1],
                    'phone_number' => $row[2],
                    'product_code' => $row[3],
                    'final_price' => $row[4],
                    'quantity' => $row[5],
                ]
            );
        }
        $this->info('Orders fetched successfully');
    }
}
