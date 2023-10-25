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
        Schema::create('audit_report', function (Blueprint $table) {
            $table->id();
            $table->string('audit_year1');
            $table->string('audit_report1');
            $table->string('audit_year2');
            $table->string('audit_report2');
            $table->string('audit_year3');
            $table->string('audit_report3');
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
        Schema::dropIfExists('audit_report');
    }
};
