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
        Schema::create('top_up_histories', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('reference_number')->unique();
            $table->integer('coin_amount');
            $table->decimal('price', 10, 2);
            $table->enum('payment_method', ['qr', 'card'])->default('qr');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_up_histories');
    }
};
