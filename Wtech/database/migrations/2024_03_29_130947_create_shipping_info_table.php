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

        Schema::create('shipping_info', function (Blueprint $table) {
            $table->id();
            $table->string('country', 25);
            $table->string('street', 25);
            $table->string('street_num', 10);
            $table->string('zip', 10);
            $table->string('name', 50);
            $table->string('surname', 50);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_info');
    }
};
