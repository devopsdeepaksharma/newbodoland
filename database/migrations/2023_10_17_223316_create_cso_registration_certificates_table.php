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
        Schema::create('cso_registration_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image'); // Image column
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('doc_type');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('doc_type')->references('id')->on('document_masters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cso_registration_certificates');
    }
};
