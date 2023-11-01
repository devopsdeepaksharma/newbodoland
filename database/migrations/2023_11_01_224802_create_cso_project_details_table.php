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
        Schema::create('cso_project_details', function (Blueprint $table) {
            $table->id();
            $table->string('state_id');
            $table->string('block_id');
            $table->string('vcdc_id');
            $table->string('village_name');
            $table->string('household_count');
            $table->string('hr_budget');
            $table->string('admin_budget');
            $table->string('program_name');
            $table->string('fund_source');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cso_project_details');
    }
};
