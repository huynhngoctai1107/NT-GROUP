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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_category_transaction')->constrained('transaction_categories');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_method')->constrained('payment_methods');
            $table->timestamps();
            $table->bigInteger('surplus');
            $table->string('voucher',50)->default('');
            $table->bigInteger('price');
            $table->tinyInteger('status')->default(0);
            $table->string('content',255);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
