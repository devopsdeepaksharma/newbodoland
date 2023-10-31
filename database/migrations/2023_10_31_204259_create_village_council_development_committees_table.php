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
        Schema::create('village_council_development_committees', function (Blueprint $table) {
            $table->id();
            $table->string('vcdc_name')->nullable();
            $table->unsignedBigInteger('block_id')->nullable();
            $table->timestamps();
            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_council_development_committees');
    }
};
