<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('national_code');
            $table->string('birthday_date');
            $table->string('lastـdegree');
            $table->string('averageـofـtheـlastـdegree');
            $table->enum('gender', ['male','female']);
            $table->enum('military_service_status', ['exempt','still to do','completed']);
            $table->enum('marital_status', ['single','married']);
            $table->string('id_number');
            $table->string('phone_number');
            $table->text('image');
            $table->string('salary');
            $table->string('position');
            $table->string('email')->unique()->nullable();
            $table->string('password');
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
        Schema::dropIfExists('teachers');
    }
}
