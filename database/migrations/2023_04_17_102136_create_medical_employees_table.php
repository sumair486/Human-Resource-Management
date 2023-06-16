<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_employees', function (Blueprint $table) {
            $table->id();
            $table->string('med_card');
            $table->string('issue_date');
            $table->string('exp_date');
            $table->string('company');
            $table->string('class');
            $table->string('blood');
            $table->string('notes');
             $table->string('plate_no');
            $table->string('asset_no');
            $table->string('vechile');
            $table->string('isthimara_issue');
            $table->string('isthimara_expiry');
            $table->string('note');

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
        Schema::dropIfExists('medical_employees');
    }
}
