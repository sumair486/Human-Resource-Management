<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_employees', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('religion');
            $table->string('qualification');
            $table->string('profession');
            $table->string('martial_status');
            $table->string('addition_skills');
            $table->string('phone');
            $table->string('email');
            $table->string('sponsor');
            $table->string('type_of_sponsor');
            $table->string('address_kingdom');
            $table->string('address_abroad');
            $table->string('image');
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
        Schema::dropIfExists('detail_employees');
    }
}
