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
        Schema::create('registration_detail', function (Blueprint $table) {
            $table->id();
            $table->string('modeofregistartion');
            $table->date('dateofregistartion');
            $table->string('registartion_number');
            $table->string('registartion_certificate');
            $table->string('12a_registration_number');
            $table->string('12a_certificate');
            $table->string('pan');
            $table->string('in_darpan');
            $table->string('tan_number');
            $table->string('80g_number');
            $table->string('fcra_number');
            $table->string('in_fcra');
            $table->date('fcra_renewal_date');
            $table->string('fcra_certificate');
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
        Schema::dropIfExists('registration_detail');
    }
};
