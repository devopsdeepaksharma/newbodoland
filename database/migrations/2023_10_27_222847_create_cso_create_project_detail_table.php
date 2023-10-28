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
        Schema::create('cso_create_project_detail', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->string('block');
            $table->string('vcdc');
            $table->string('village');
            $table->string('household');
            $table->string('hr');
            $table->string('admin_budget');
            $table->string('program');
            $table->string('source');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cso_create_project_detail');
    }
};
