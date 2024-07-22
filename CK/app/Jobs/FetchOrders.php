<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\GoogleSheetService;

class FetchOrders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $googleSheetService;

    public function __construct(GoogleSheetService $googleSheetService)
    {
        $this->googleSheetService = $googleSheetService;
    }

    public function handle()
    {
        $spreadsheetId = '1WlC2O1d7U2DiQ54tgqU_CPldYzJeFpZHIT2d7PB3sps';
        $ordersRange = 'OrderData!A:F';
        $orders = $this->googleSheetService->fetchOrders($spreadsheetId, $ordersRange);

        // Process and store orders in the database
    }
}
