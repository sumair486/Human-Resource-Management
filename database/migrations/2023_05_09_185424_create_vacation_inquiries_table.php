<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacation_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('employee');
            $table->string('basic');
            $table->string('name');
            $table->string('housing');
            $table->string('division');
            $table->string('car_allowance');
            $table->string('position');
            $table->string('food_allowance');
            $table->string('join_date');
            $table->string('transport');
            $table->string('other_allowance');
            $table->string('last_leave_date');
            $table->string('current_leave_date');
            $table->string('last_leave_return_date');
            $table->string('balance_brought');
            $table->string('balance_after_last');
            $table->string('due_from_last');
            $table->string('total_due');
            $table->string('amount_due');



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
        Schema::dropIfExists('vacation_inquiries');
    }
}
