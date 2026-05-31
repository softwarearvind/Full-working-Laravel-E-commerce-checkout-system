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

    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('order_no')->unique();
    $table->string('name');
    $table->string('email');
    $table->string('phone');
    $table->text('address');
    $table->string('city');
    $table->string('state');
    $table->string('pincode');
    $table->decimal('grand_total', 10, 2);
    $table->enum('payment_method', ['cod', 'online']);
    $table->enum('payment_status', ['pending', 'paid'])
          ->default('pending');
    $table->enum('order_status', [
        'pending',
        'confirmed',
        'packed',
        'shipped',
        'delivered',
        'cancelled'
    ])->default('pending');

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
