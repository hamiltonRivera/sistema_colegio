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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->double('evaluation');
            $table->string('description');

            $table->unsignedBigInteger('student_id');
             $table->foreign('student_id')
              ->references('id')
              ->on('students')
              ->onUpdate('cascade')
              ->onDelete('cascade');

              $table->unsignedBigInteger('course_id');
              $table->foreign('course_id')
               ->references('id')
               ->on('courses')
               ->onUpdate('cascade')
               ->onDelete('cascade');

              $table->unsignedBigInteger('teacher_id');
              $table->foreign('teacher_id')
               ->references('id')
               ->on('teachers')
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
        Schema::dropIfExists('evaluations');
    }
};
