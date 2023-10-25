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
        Schema::create('annual_report', function (Blueprint $table) {
            $table->id();
            $table->string('annual_year1');
            $table->string('annual_report1');
            $table->string('annual_year2');
            $table->string('annual_report2');
            $table->string('annual_year3');
            $table->string('annual_report3');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual_report');
    }
};
