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
        Schema::table('pemesanans', function (Blueprint $table) {
            // Cek apakah kolom belum ada sebelum ditambahkan
            if (!Schema::hasColumn('pemesanans', 'user_id')) {
                $table->foreignId('user_id')->after('id')->nullable()->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('pemesanans', 'lokasi_acara')) {
                $table->string('lokasi_acara')->after('tanggal')->nullable();
            }
            if (!Schema::hasColumn('pemesanans', 'jumlah_tamu')) {
                $table->integer('jumlah_tamu')->after('lokasi_acara')->default(0);
            }
        });

        // Rename kolom di statement terpisah jika belum di-rename
        if (Schema::hasColumn('pemesanans', 'tanggal') && !Schema::hasColumn('pemesanans', 'tanggal_acara')) {
            Schema::table('pemesanans', function (Blueprint $table) {
                $table->renameColumn('tanggal', 'tanggal_acara');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rename balik dulu
        if (Schema::hasColumn('pemesanans', 'tanggal_acara')) {
            Schema::table('pemesanans', function (Blueprint $table) {
                $table->renameColumn('tanggal_acara', 'tanggal');
            });
        }

        // Baru drop kolom
        Schema::table('pemesanans', function (Blueprint $table) {
            if (Schema::hasColumn('pemesanans', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('pemesanans', 'lokasi_acara')) {
                $table->dropColumn('lokasi_acara');
            }
            if (Schema::hasColumn('pemesanans', 'jumlah_tamu')) {
                $table->dropColumn('jumlah_tamu');
            }
        });
    }
};
