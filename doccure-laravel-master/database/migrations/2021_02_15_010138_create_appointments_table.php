<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->date('date');
            $table->integer('duration_minutes');
            $table->time('start_time');
            $table->time('end_time');

            $table->enum('status', ['Waiting', 'Accepted', 'Rejected', 'Processing', 'Finished', 'Canceled'])->default('Waiting');
            $table->mediumText('details');

            $table->foreignId('doctor_id');
            $table->foreign('doctor_id')->on('doctors')->references('id');

            $table->foreignId('patient_id');
            $table->foreign('patient_id')->on('patients')->references('id');

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
        Schema::dropIfExists('appointments');
    }
}
