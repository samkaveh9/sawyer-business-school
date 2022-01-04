<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('id_number');
            $table->string('grade');
            $table->unsignedSmallInteger('theoretic_unit')->default(0);
            $table->unsignedSmallInteger('practical_unit')->default(0);
            $table->string('prerequisites')->default('does not have');
            $table->string('need')->default('does not have');
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->string('exam_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
