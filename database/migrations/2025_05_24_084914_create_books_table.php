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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('author_id');   
            $table->unsignedInteger('publisher_id');
            $table->string('description')->nullable();
            $table->string('genre')->nullable();
            $table->integer('quantity');
            $table->unsignedBigInteger('isbn')->unique();
            $table->date('publication_date');
            $table->string('language');
            $table->unsignedInteger('total_pages');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
