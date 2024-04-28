<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('product')->nullable();
            $table->string('name')->nullable();
            $table->string('size')->nullable();
            $table->integer('count')->nullable();
            $table->string('imgsrc')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('streetNumber')->nullable();
            $table->string('town')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('cardNumber')->nullable();
            $table->string('ExpiryDate')->nullable();
            $table->string('CVV')->nullable();
            $table->string('paymentOption')->nullable();
            $table->timestamps();
        });
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('product')->nullable();
            $table->string('name')->nullable();
            $table->string('size')->nullable();
            $table->integer('count')->nullable();
            $table->string('imgsrc')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('orders');
    }
};
