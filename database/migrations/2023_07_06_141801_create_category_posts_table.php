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
        Schema::create('categories_news_post', function (Blueprint $table) {
            $table->unsignedBigInteger('categories_news_id');
            $table->unsignedBigInteger('post_id');

            $table->primary(['categories_news_id','post_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_news_post');
    }
};
