<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacation_salaries', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no');
            $table->string('date');
            $table->string('hijri');
            $table->string('ref_vacation_no');
            $table->string('emp_code');
            $table->string('name');
            $table->string('ref_vacation_date');
            $table->string('join_date');
            $table->string('last_day');
            $table->string('vacation_start');
            $table->string('paid_day');
            $table->string('vacation_end');
            $table->string('unpaid_days');
            $table->string('balance_days');
            $table->string('public_holidays');
            $table->string('total_consumed');
            $table->string('total_leave_day');
            $table->string('back_duty');
            $table->string('total_regular_salary');
            $table->string('total_vacation_salary');
            $table->string('net_salary');
            $table->string('payment_vacation');

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
        Schema::dropIfExists('vacation_salaries');
    }
}
