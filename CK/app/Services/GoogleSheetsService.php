<?php
namespace App\Services;

use Google\Client;
use Google\Service\Sheets;

class GoogleSheetService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(config('services.google_sheets.credentials_path'));
        $this->client->addScope(Sheets::SPREADSHEETS_READONLY);
        $this->service = new Sheets($this->client);
    }

    public function fetchOrders()
    {
        $spreadsheetId = config('services.google_sheets.spreadsheet_id');
        $range = 'Orders!A:F';
        $response = $this->service->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }

    public function fetchProducts()
    {
        $spreadsheetId = config('services.google_sheets.spreadsheet_id');
        $range = 'Products!A:D';
        $response = $this->service->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }
}
