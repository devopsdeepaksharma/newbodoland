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
        Schema::create('budget_information', function (Blueprint $table) {
            $table->id();
            $table->string('budget_year1');
            $table->string('budget1');
            $table->string('budget_year2');
            $table->string('budget2');
            $table->string('budget_year3');
            $table->string('budget3');
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
        Schema::dropIfExists('budget_information');
    }
};
