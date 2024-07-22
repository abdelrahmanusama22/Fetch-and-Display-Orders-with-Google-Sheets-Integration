<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTableTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    
    public function testOrderTableRendersCorrectly()
    {
        $response = $this->get('/orders'); 
        $response->assertStatus(200);
        $response->assertSee('Search by phone or client name...');
    }
}
