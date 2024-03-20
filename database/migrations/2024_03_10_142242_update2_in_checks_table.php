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
        Schema::table('cheks', function (Blueprint $table) {
            $table->integer("hijriyah")->nullable(false);
            $table->foreign("hijriyah")->references("hijriyah")->on("ramadhan_days");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checks', function (Blueprint $table) {
            //
        });
    }
};
