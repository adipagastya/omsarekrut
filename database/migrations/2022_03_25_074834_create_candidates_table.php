<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('place_birth');
            $table->string('date_birth');
            $table->string('studies');
            $table->string('major');
            $table->string('edu_level');
            $table->string('grad_year');
            $table->string('study_certificate');
            $table->string('transcript');
            $table->string('profile');
            $table->enum('status', ['Belum Diproses', 'Screening', 'Interview', 'Interview Lanjuatan', 'Diterima', 'Ditolak'])->default('Belum Diproses');
            $table->string('application_date');
            $table->foreignId('workfield_id');
            $table->foreignId('certificate_id');
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
        Schema::dropIfExists('candidates');
    }
}
