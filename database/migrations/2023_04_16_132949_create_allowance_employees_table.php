<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowanceEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowance_employees', function (Blueprint $table) {
            $table->id();
            $table->string('salary');
            $table->string('housing');
            $table->string('mobile');
            $table->string('badal');
            $table->string('transport');
            $table->string('other');
            $table->string('gosi');
            $table->string('eos');
            $table->string('vacation');
            $table->string('ticket');
            $table->string('housing_allowance');
            $table->string('family');
            // $table->string('salary');
       

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
        Schema::dropIfExists('allowance_employees');
    }
}
