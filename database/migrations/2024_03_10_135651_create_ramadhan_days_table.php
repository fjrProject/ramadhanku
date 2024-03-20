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
        Schema::create('ramadhan_days', function (Blueprint $table) {
            $table->id();
            $table->date("start_masehi")->nullable(false);
            $table->date("end_masehi")->nullable(false);
            $table->date("hijriyah")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ramadhan_days');
    }
};
