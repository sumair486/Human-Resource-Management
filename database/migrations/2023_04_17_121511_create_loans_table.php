<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->string('date');
            $table->string('hijri');
            $table->string('emp_code');
            $table->string('name');
            $table->string('type_loan');
            $table->string('amount');
            $table->string('installment');
            $table->string('monthly');
            $table->string('ded_starting');
            $table->string('unpaid');
            $table->string('balance_amount');
            $table->string('req_by');
            $table->string('approved')->nullable();
            $table->string('req_date');
            $table->string('date_h');
            $table->string('date_req');
            $table->string('date_h1');
            $table->string('remark');
            $table->string('remark_2');


        
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
        Schema::dropIfExists('loans');
    }
}
