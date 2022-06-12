<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->string('phone_number');
            $table->enum('gender', ['M', 'F']);
            $table->date('date_of_birth');
            $table->string('bio')->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('password')->nullable();;

            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->foreignId('speciality_id');
            $table->foreign('speciality_id')->references('id')->on('specialities');

            $table->enum('pricing', ['Free', 'Custom'])->default('Free');
            $table->float('per_hour')->nullable();

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
        Schema::dropIfExists('doctors');
    }
}
