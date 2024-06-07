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
        Schema::create('labs', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger("user_id");
            $table->string("cholesterol")->nullable();
            $table->string("triglyceride")->nullable();
            $table->string("LDL")->nullable();
            $table->string("HDL")->nullable();
            $table->string("apolipoprotein")->nullable();
            $table->string("Lp")->nullable();
            $table->string("ASAT")->nullable();
            $table->string("ALAT")->nullable();
            $table->string("Gamma")->nullable();
            $table->string("Alkaline")->nullable();
            $table->string("Creatine")->nullable();
            $table->string("Uric")->nullable();
            $table->string("Glucose")->nullable();
            $table->string("Hemoglobin")->nullable();
            $table->string("mdate")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labs');
    }
};
