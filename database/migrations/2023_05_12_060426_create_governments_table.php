<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('governments', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no');
            $table->string('date');
            $table->string('employee');
            $table->string('nationality');
            $table->string('sex');
            $table->string('birth_date');
            $table->string('kingdom_entry');
            $table->string('marital');
            $table->string('passport_no');
            $table->string('passport_issue');
            $table->string('passport_expiry');
            $table->string('passport_place');
            $table->string('iqama_no');
            $table->string('iqama_issue');
            $table->string('iqama_expiry');
            $table->string('iqama_place');
            $table->string('qualification');
            $table->string('certificate');
            $table->string('profession');
            $table->string('gover_as');
            $table->string('experience');
            $table->string('sponsor');
            $table->string('labour_employee');
            $table->string('business');
            $table->string('commercial');
            $table->string('issue_date');
            $table->string('issue');
            $table->string('salary');
            $table->string('other');
            $table->string('permit');
            $table->string('city');
            $table->string('district');
            $table->string('street');
            $table->string('tel');
            $table->string('box');
            $table->string('zip_code');

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
        Schema::dropIfExists('governments');
    }
}
