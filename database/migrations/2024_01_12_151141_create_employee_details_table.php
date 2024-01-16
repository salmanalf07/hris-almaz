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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('empId');
            $table->string('levelId');
            $table->string('deptId');
            $table->date('joinDate');
            $table->string('typeEmployeeId');
            $table->string('status');
            $table->string('contractNo')->nullable();
            $table->date('contractSt')->nullable();
            $table->date('contrcatEd')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};
