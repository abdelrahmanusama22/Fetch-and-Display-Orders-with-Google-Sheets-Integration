<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id(); 
        $table->string('product_name'); 
        $table->text('description'); 
        $table->string('country'); 
        $table->string('product_code'); 
        $table->timestamps(); 
    });
}
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
