<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->text('message');
            $table->softDeletes();

            //INDEX
            $table->index('post_id', 'posts_comments_idx');
            $table->index('user_id', 'users_comments_idx');
            //FOREIGN KEY
            $table->foreign('post_id', 'posts_comments_fk')->on('posts')->references('id');
            $table->foreign('user_id', 'users_comments_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
