<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacation_entries', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no');
            $table->string('date_g');
            $table->string('date_hijri');
            $table->string('employee_code');
            $table->string('name');
            $table->string('vacation_type');
            $table->string('vacation_days');
            $table->string('vacation_starting_days')->nullable();
            $table->string('approved_days')->nullable();
            $table->string('vacation_starting_days_h')->nullable();
            $table->string('vacation_end_days')->nullable();
            $table->string('days_request')->nullable();
            $table->string('vacation_end_days_h')->nullable();
            $table->string('days_consumed');
            $table->string('last_vacation_days');
            $table->string('balance_days');
            $table->string('req_by');
            $table->string('req_date');
            $table->string('req_date_h');
            $table->string('remark_1');
            $table->string('approved_by')->nullable();
            $table->string('date')->nullable();
            $table->string('date_h')->nullable();
            $table->string('remark')->nullable();

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
        Schema::dropIfExists('vacation_entries');
    }
}
