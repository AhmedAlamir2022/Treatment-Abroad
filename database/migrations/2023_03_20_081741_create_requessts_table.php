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
        Schema::create('requessts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('ndoctor_id')->constrained('n_doctors')->cascadeOnDelete();
            $table->foreignId('fdoctor_id')->constrained('f_doctors')->cascadeOnDelete();
            $table->text('test_result');
            $table->text('ndoctor_details');
            $table->string('status')->nullable();
            $table->text('fdoctor_details')->nullable();
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
        Schema::dropIfExists('requessts');
    }
};
