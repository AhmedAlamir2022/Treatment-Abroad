<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hospital_id');
            $table->string('specialization_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username')->nullable();
            $table->string('contact')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('bloodtype')->nullable();
            $table->string('religion')->nullable();
            $table->text('address')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('doctor_image')->nullable();
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
        Schema::dropIfExists('f_doctors');
    }
};
