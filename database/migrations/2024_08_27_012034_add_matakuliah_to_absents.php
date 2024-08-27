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
        Schema::table('absents', function (Blueprint $table) {
            $table->unsignedBigInteger('matakuliah_id')->nullable();

            $table->foreign('matakuliah_id')->references('id')->on('matakuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absents', function (Blueprint $table) {
            $table->dropColumn('matakuliah');
        });
    }
};
