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
        Schema::disableForeignKeyConstraints();

        Schema::create('item_quantity', function (Blueprint $table) {
            $table->id();
            $table->integer('size_id');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->integer('count');
            $table->integer('item_id');
            $table->foreign('item_id')->references('id')->on('items');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_quantity');
    }
};
