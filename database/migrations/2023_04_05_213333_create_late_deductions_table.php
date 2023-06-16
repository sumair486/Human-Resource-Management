<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLateDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('late_deductions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('arabic_name');
            $table->string('consider');
            $table->string('rate_1')->nullable();
            //15 min
            $table->string('first_day_1');
            $table->string('second_day_1');
            $table->string('third_day_1');
            $table->string('fourth_day_1');
            //30min
            $table->string('first_day_2');
            $table->string('second_day_2');
            $table->string('third_day_2');
            $table->string('fourth_day_2');
            //30 to 60
            $table->string('first_day_3');
            $table->string('second_day_3');
            $table->string('third_day_3');
            $table->string('fourth_day_3');
            //e>60
            $table->string('first_day_4');
            $table->string('second_day_4');
            $table->string('third_day_4');
            $table->string('fourth_day_4');
            $table->enum('status',['Active','In-active']);
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
        Schema::dropIfExists('late_deductions');
    }
}
