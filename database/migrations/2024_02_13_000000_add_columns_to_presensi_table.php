<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('presensi', function (Blueprint $table) {
            $table->string('status')->default('hadir')->after('lokasi_out'); // hadir, absen, terlambat
            $table->boolean('manual_entry')->default(false)->after('status'); // true jika entri manual
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('presensi', function (Blueprint $table) {
            $table->dropColumn(['status', 'manual_entry']);
        });
    }
};
