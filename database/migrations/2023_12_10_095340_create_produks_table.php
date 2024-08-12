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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("umkm_id");
            $table->string("kd_produk")->unique();
            $table->string("nama_produk");
            $table->string("harga");
            $table->string("kategori");
            $table->string("letak_barang");
            $table->timestamps();

            $table->foreign('umkm_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
