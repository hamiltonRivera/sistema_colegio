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
        Schema::create('grade_students', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('grade_id')->unique();
            $table->foreign('grade_id')
             ->references('id')
             ->on('grades')
             ->onUpdate('cascade')
             ->onDelete('cascade');

             $table->unsignedBigInteger('student_id')->unique();
             $table->foreign('student_id')
              ->references('id')
              ->on('students')
              ->onUpdate('cascade')
              ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_students');
    }
};
