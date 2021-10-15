<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("Title", 50)->unique();
            $table->string("Slug", 50)->unique(); 
            $table->text('body');
            $table->string("image", 200);
            $table->boolean('published')->default(0)->index();
            $table->foreignUuid('category_id')->references('id')->on('categorys')->constrained()->onDelete('cascade');
            $table->foreignUuid('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
