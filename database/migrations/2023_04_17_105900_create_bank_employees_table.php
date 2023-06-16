<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_employees', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('account_no');
            $table->string('branch_name');
            $table->string('account_code');
            $table->string('bank_code');
            $table->string('note');
            $table->string('address');
            $table->string('summary');
            $table->string('reason');


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
        Schema::dropIfExists('bank_employees');
    }
}
