<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('department');
            $table->string('employee_no');
            $table->string('emp_name');
            $table->integer('days_work');
            $table->integer('overtime');

            $table->integer('basic_monthly_pay');
            $table->integer('housing');
            $table->integer('transportation');
            $table->integer('food');
            $table->integer('overtime_hour');
            $table->integer('other');
            $table->integer('total');
            $table->integer('absent');
            $table->integer('gosi');
            $table->integer('personal_loan');
            $table->integer('late_penality');
            $table->integer('other_ded');
            $table->integer('car_loan');
            $table->integer('total_deduction');
            $table->integer('net_total');

            $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payslips');
    }
}
