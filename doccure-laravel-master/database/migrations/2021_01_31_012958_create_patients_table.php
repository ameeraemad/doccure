<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->enum('blood_group', ['A-', 'A+', 'B-', 'B+', 'AB-', 'AB+', 'O-', 'O+']);
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('address');
            $table->enum('gender', ['M', 'F']);
            $table->string('password')->nullable();

            $table->foreignId('city_id');
            $table->foreign('city_id')->on('cities')->references('id');

            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('patients');
    }
}
