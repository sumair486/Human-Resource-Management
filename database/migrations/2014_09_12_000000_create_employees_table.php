<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_no')->unique();
            $table->text('first_name');
            $table->text('middle_name')->nullable();
            $table->text('first_name_arb');
            $table->text('grand_name_arb');
            $table->text('family_name');
            $table->text('middle_name_arb')->nullable();
            $table->text('family_name_arb');

            $table->text('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('religion');
            $table->string('qualification');
            $table->string('professions');
            $table->text('martial_status');
            $table->text('addition_skills');
            $table->text('phone');
            $table->text('email');
            $table->text('sponsor');
            $table->text('type_of_sponsor');
            $table->text('address_kingdom');
            $table->text('address_abroad');
            $table->text('image');

            $table->text('contract_period');
            $table->text('join_date');
            $table->text('expiry_date');
            $table->text('active_form');
            $table->text('family_mamber');
            $table->text('no_of_ticket');
            $table->text('ticket_values');
            $table->text('total');
            $table->text('notes_contract');
            $table->text('company_contract');
            $table->text('division');
            $table->text('branch');
            $table->text('department');
            $table->text('job_title');
            $table->text('category');
            $table->text('allocation');
            $table->text('gl_code');
            $table->text('for_index');
            $table->text('hijri_1');
            $table->text('hijri_2');
            $table->string('statuses');


            $table->text('passport');
            $table->text('passport_issuedate');
            $table->text('passport_expdate');
            $table->text('passport_issueat');
            $table->text('Iqama');
            $table->text('Iqama_issuedate');
            $table->text('Iqama_expdate');
            $table->text('Iqama_issueat');
            $table->text('work');
            $table->text('work_issuedate');
            $table->text('work_expdate');
            $table->text('work_issueat');
            $table->text('driving');
            $table->text('driving_issuedate');
            $table->string('driving_expdate');
            $table->string('driving_issueat');
            $table->string('vehicle');
            $table->string('vehicle_issuedate');
            $table->string('vehicle_expdate');
            $table->string('vehicle_issueat');
            $table->string('gosi_allowance');
            $table->string('gosi_issuedate');
            $table->string('gosi_issueat');
            $table->string('profession');

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

            $table->string('name');
            $table->string('relation');
            $table->string('dob');
            $table->string('passport_no');
            $table->string('pass_issue_date');
            $table->string('pass_expiry_date');



            $table->string('med_card');
            $table->string('issue_date');
            $table->string('exp_date');
            $table->string('company');
            $table->string('class');
            $table->string('blood');
            $table->string('notes');
             $table->string('plate_no');
            $table->string('asset_no');
            $table->string('vechile');
            $table->string('isthimara_issue');
            $table->string('isthimara_expiry');
            $table->string('note');

            $table->string('bank_name');
            $table->string('account_no');
            $table->string('branch_name');
            $table->string('account_code');
            $table->string('bank_code');
            $table->string('notes_bank');
            $table->string('address');
            $table->string('summary');
            $table->string('reason');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
