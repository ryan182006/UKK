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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id');
            $table->string('snap_token')->nullable();
            $table->foreignId('alamat_id');
            $table->enum('payment_status', ['1', '2', '3', '4'])->default('1')->comment('1=Menunggu Pembayaran, 2=Sudah Dibayar, 3=Kadaluarsa');
            $table->enum('status', ['1', '2', '3', '4', '5'])->comment('1=Menunggu Konfirmasi, 2=Sedang Diproses, 3=Dikirim, 4=Selesai')->nullable();
            $table->string('courier');
            $table->string('layanan')->nullable();
            $table->double('total');
            $table->double('ongkir');
            $table->string('estimasi')->nullable();
            $table->string('opsi_kirim')->nullable();
            $table->text('catatan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
