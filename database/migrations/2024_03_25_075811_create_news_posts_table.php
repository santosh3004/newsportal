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
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('user_id');
            $table->string('news_title');
            $table->string('news_title_slug');
            $table->string('image');
            $table->text('news_details');
            $table->text('tags');
            $table->integer('breaking_news')->nullable(); //1=Yes, 0=No
            $table->integer('top_slider')->nullable(); //1=Yes, 0=No
            $table->integer('first_section_three')->nullable(); //1=Yes, 0=No
            $table->integer('first_section_nine')->nullable(); //1=Yes, 0=No
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
            $table->integer('status')->default(1); //1=Active, 0=Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_posts');
    }
};
