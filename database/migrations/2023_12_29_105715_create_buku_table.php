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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable(false);
            $table->unsignedBigInteger('id_kategori')->nullable(false)->index();
            $table->unsignedBigInteger('id_user')->nullable(false)->index();
            $table->string('deskripsi')->nullable(false);
            $table->unsignedBigInteger('jumlah')->nullable(false);
            $table->longText('file')->nullable(false);
            $table->longText('cover')->nullable(false);
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
