<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('goodreads_link')->nullable()->after('book_image');
            $table->string('amazon_link')->nullable()->after('goodreads_link');
            $table->string('ingramspark_link')->nullable()->after('amazon_link');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['goodreads_link', 'amazon_link', 'ingramspark_link']);
        });
    }
};