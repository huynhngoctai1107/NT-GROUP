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
        Schema::create('posts', function (Blueprint $table){
            $table->id();
            $table->foreignId('id_category')->constrained('category_posts');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_price')->constrained('prices');
            $table->foreignId('id_acreage')->constrained('acreages');
            $table->string('slug')->unique();
            $table->longText('title');
            $table->longText('subtitles');
            $table->longText('content');
            $table->integer('featured_news')->default(0);
            $table->string('link_youtube',255)->default('');
            $table->longText('address');
            $table->tinyInteger('status')->default(0);
            $table->integer('number_views')->default(0);
            $table->string('longitude',255);
            $table->string('latitude',255);
            $table->integer('voucher')->default(0);
            $table->string('compilation',255);


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
