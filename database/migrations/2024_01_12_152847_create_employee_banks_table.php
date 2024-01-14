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
        Schema::create('employee_banks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('empId');
            $table->string('bankName')->nullable();
            $table->string('accName')->nullable();
            $table->string('accNumber')->nullable();
            $table->string('acclocation')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_banks');
    }
};
