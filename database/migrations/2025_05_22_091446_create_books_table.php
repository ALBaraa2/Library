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
            $table->string('author');   
            $table->string('publisher');
            $table->string('description')->nullable();
            $table->integer('quantity');
            $table->unsignedBigInteger('isbn')->unique();
            $table->date('publication_date');
            $table->unsignedInteger('total_pages');
            $table->string('language');
            $table->float('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
