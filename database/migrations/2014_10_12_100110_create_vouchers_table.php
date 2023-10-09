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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->unique();
            $table->string('code',100);
            $table->string('slug')->unique();
            $table->integer('condition');
            $table->bigInteger('discount');
            $table->integer('quantify');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->date('expiration_date');
            $table->string('content',255);
            $table->string('image',100);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
