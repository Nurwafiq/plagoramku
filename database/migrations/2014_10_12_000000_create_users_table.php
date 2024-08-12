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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('roles');
            $table->string('name');
            $table->string('username');
            $table->string('password');

            $table->text('alamat_umkm')->nullable();
            // $table->string('no_wa_umkm')->nullable();
            $table->string('email_umkm')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('tahun_berdiri')->nullable();

            $table->string('nama_pemilik')->nullable();
            // $table->string('no_wa_pemilik')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
