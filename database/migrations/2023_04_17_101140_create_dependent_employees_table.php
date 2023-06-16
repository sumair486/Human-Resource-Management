<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependentEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependent_employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('relation');
            $table->string('dob');
            $table->string('passport_no');
            $table->string('pass_issue_date');
            $table->string('pass_expiry_date');


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
        Schema::dropIfExists('dependent_employees');
    }
}
