<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_employees', function (Blueprint $table) {
            $table->id();
            $table->string('passport');
            $table->string('passport_issuedate');
            $table->string('passport_expdate');
            $table->string('passport_issueat');
            $table->string('Iqama');
            $table->string('Iqama_issuedate');
            $table->string('Iqama_expdate');
            $table->string('Iqama_issueat');
            $table->string('work');
            $table->string('work_issuedate');
            $table->string('work_expdate');
            $table->string('work_issueat');
            $table->string('driving');
            $table->string('driving_issuedate');
            $table->string('driving_expdate');
            $table->string('driving_issueat');
            $table->string('vehicle');
            $table->string('vehicle_issuedate');
            $table->string('vehicle_expdate');
            $table->string('vehicle_issueat');
            $table->string('gosi');
            $table->string('gosi_issuedate');
            $table->string('gosi_issueat');
            $table->string('profession');


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
        Schema::dropIfExists('document_employees');
    }
}
