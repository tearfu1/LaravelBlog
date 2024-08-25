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
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->timestamps();

            // IDX
            $table->index('user_id', 'pul_user_idx');
            $table->index('post_id', 'pul_post_idx');

            // FK
            $table->foreign('user_id','pul_user_fk')->on('users')->references('id');
            $table->foreign('post_id','pul_post_fk')->on('posts')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_user_likes');
    }
};
