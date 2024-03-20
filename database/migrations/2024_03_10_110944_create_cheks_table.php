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
        Schema::create('cheks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("username", 15)->nullable(false);
            $table->string("ibadah", 200)->nullable(false)->default("0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheks');
    }
};
