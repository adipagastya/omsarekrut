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
            $table->string('address');
            $table->string('residence_address');
            $table->string('place_birth');
            $table->string('date_birth');
            $table->string('family_name');
            $table->string('family_status');
            $table->string('family_phone');
            $table->string('studies');
            $table->string('major');
            $table->enum('edu_level', ['SMA/K', 'Diploma', 'Sarjana']);
            $table->string('grad_year');
            $table->string('study_certificate');
            $table->string('transcript');
            $table->string('str_certificate');
            $table->string('personal_id_card');
            $table->string('family_id_card');
            $table->string('skck');
            $table->string('health_information');
            $table->string('profile');
            $table->enum('status', ['Belum Diproses', 'Screening', 'Interview', 'Interview Lanjuatan', 'Diterima', 'Ditolak'])->default('Belum Diproses');
            $table->string('application_date');
            $table->foreignId('region_id');
            $table->foreignId('workfield_id');
            $table->foreignId('certificate_id');
            $table->foreignId('work_exp_id');
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
