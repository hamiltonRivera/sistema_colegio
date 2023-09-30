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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('cod')->unique();

            $table->unsignedBigInteger('user_id');
             $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onUpdate('cascade')
              ->onDelete('cascade');

             $table->unsignedBigInteger('tutor_id');
             $table->foreign('tutor_id')
              ->references('id')
              ->on('tutors')
              ->onUpdate('cascade')
              ->onDelete('cascade');

            $table->string('email')->unique();
            $table->date('birth_date');
            $table->integer('age');
            $table->string('status')->default('Activo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
