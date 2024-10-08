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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->biginteger('admin_id', NULL);
            $table->integer('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->decimal('total_price', 15, 0);
            $table->tinyinteger('status'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
