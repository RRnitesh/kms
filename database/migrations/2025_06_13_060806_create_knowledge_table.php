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
        Schema::create('knowledge', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_topic_id');
            $table->string('title');
            $table->unsignedBigInteger('user_id'); // creator
            $table->integer('current_revision')->default(1); // latest revision number
            $table->timestamps();

            $table->foreign('sub_topic_id')->references('id')->on('sub_topics')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge');
    }
};
