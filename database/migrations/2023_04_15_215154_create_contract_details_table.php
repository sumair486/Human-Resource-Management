<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_details', function (Blueprint $table) {
            $table->id();
            $table->string('contract_period');
            $table->string('join_date');
            $table->string('expiry_date');
            $table->string('active_form');
            $table->string('family_mamber');
            $table->string('no_of_ticket');
            $table->string('ticket_values');
            $table->string('total');
            $table->string('notes');
            $table->string('company');
            $table->string('division');
            $table->string('branch');
            $table->string('department');
            $table->string('job_title');
            $table->string('category');
            $table->string('allocation');
            $table->string('gl_code');
            $table->string('for_index');
            $table->string('hijri_1');
            $table->string('hijri_2');
            // $table->string('allowed');
            $table->string('statuses')->nullable();

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
        Schema::dropIfExists('contract_details');
    }
}
