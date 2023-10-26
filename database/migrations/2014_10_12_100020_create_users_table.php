<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    /**
     * Run the migrations.
     */
    public function up()
    : void{
        Schema::create('users', function (Blueprint $table){
            $table->id();
            $table->foreignId('id_role')->constrained('roles');
            $table->integer('social_id')->default(0);
            $table->string('image')->default('');
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('phone', 10);
            $table->string('address', 255);
            $table->string('password');
            $table->bigInteger('wallet')->default(0);
            $table->string('token', 50)->nullable();
            $table->string('gender', 10)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('delete')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    : void{
        Schema::dropIfExists('password_reset_tokens');
    }
};
