<?php

use App\Http\Controllers\ContractDetaileController;
use App\Http\Controllers\DetailEmployeeController;
use App\Http\Controllers\DocumentDetailController;
use App\Http\Controllers\AllowanceDetailController;
use App\Http\Controllers\DependentDetailController;
use App\Http\Controllers\MedicalDetailController;
use App\Http\Controllers\BankDetailController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\GovernmentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\Vacation_module;
use App\Models\DetailEmployee;



// use Illuminate\Support\Facades\Artisan;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/reg', function () {
//     return view('welcome');
// });
Route::get('cache',function(){
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');

});

Route::get('counter',[App\Http\Controllers\Employee\TaskController::class, 'datecounter']);
//expance
Route::middleware(['logout', 'role:Admin'])->group(function() {

    Route::get('add-payable', [App\Http\Controllers\ExpanceController::class, 'AddPableExpance'])->name('add.payble');
    Route::post('post-payable', [App\Http\Controllers\ExpanceController::class, 'PostPableExpance'])->name('post.payable');
    Route::get('all-payable', [App\Http\Controllers\ExpanceController::class, 'AllPableExpance'])->name('all.payable');
    Route::get('payable/edit/{id}', [App\Http\Controllers\ExpanceController::class, 'EditPableExpance'])->name('edit.payable');
    Route::post('payable/update', [App\Http\Controllers\ExpanceController::class, 'UpdatePableExpance'])->name('update.payable');
    Route::get('payable/delete/{id}', [App\Http\Controllers\ExpanceController::class, 'deletePayableExpance'])->name('delete.payable');



    Route::get('add-recivable', [App\Http\Controllers\ExpanceController::class, 'AddrecivableExpance'])->name('add.recivable');
    Route::post('post-reciveable', [App\Http\Controllers\ExpanceController::class, 'PostReciveableExpance'])->name('post.reciveable');
    Route::get('all-recivable', [App\Http\Controllers\ExpanceController::class, 'AllreciveableExpance'])->name('all.reciveable');
    Route::get('recivable/edit/{id}', [App\Http\Controllers\ExpanceController::class, 'EditrecivableExpance'])->name('edit.recivable');
    Route::post('recivable/update', [App\Http\Controllers\ExpanceController::class, 'UpdaterecivableExpance'])->name('update.recivable');
    Route::get('recivable/delete/{id}', [App\Http\Controllers\ExpanceController::class, 'deleterecivableExpance'])->name('delete.recivable');



});

//end expence

Route::get('time-tracker', [App\Http\Controllers\TimeTrackerController::class, 'index']);

Route::middleware(['logout', 'role:Admin,HR'])->group(function() {

    Route::resource('employee', EmployeeController::class);

    Route::resource('role', RoleController::class);

    Route::resource('leave-list', LeaveController::class);

    
    Route::get('time-tracker/{id}/edit', [App\Http\Controllers\TimeTrackerController::class, 'edit']);
    Route::put('time-tracker/{id}', [App\Http\Controllers\TimeTrackerController::class, 'update']);
    // Route::delete('time-tracker/{id}', [App\Http\Controllers\TimeTrackerController::class, 'destory']);
    Route::get('time-tracker/{id}',[App\Http\Controllers\TimeTrackerController::class, 'destory'])->name('destroy.tracker');
    Route::get('time-breaker/{id}', [App\Http\Controllers\TimeTrackerController::class, 'editBreakTime']);
    Route::put('time-breaker/{id}', [App\Http\Controllers\TimeTrackerController::class, 'updateBreakTime']);

    Route::get('employee-doc/{id}/view', [App\Http\Controllers\EmployeeController::class, 'viewDocs']);
    Route::get('/emp-doc-download/{id}', [App\Http\Controllers\EmployeeController::class, 'docDownload']);
    Route::delete('/emp-doc-delete/{id}', [App\Http\Controllers\EmployeeController::class, 'deleteDocs']);

    //employee detail

    // Route::post('/addgeneral',[DetailEmployeeController::class,'store']);
    // Route::get('/employee',[DetailEmployeeController::class,'show']);

    // Route::post('/addcontract',[ContractDetaileController::class,'store']);
    // Route::post('/adddocument',[DocumentDetailController::class,'store']);
    // Route::post('/addallowance',[AllowanceDetailController::class,'store']);
    // Route::post('/adddependent',[DependentDetailController::class,'store']);
    // Route::post('/addmedical',[MedicalDetailController::class,'store']);
    // Route::post('/addbank',[BankDetailController::class,'store']);












    Route::resource('payslip', PayslipController::class);
    //fetch salary
    Route::post('payslip/salary', [App\Http\Controllers\PayslipController::class, 'employeeSalary']);

    Route::get('generate-pdf/{id}', [App\Http\Controllers\PayslipController::class, 'generatePDF']);

    Route::resource('department', DepartmentController::class);

    Route::resource('user', UserController::class);

});

Route::middleware(['logout', 'role:Admin,Manager'])->group(function() {

    Route::resource('client', ClientController::class);
    Route::resource('client-invoice', ClientInvoiceController::class);
    Route::get('client-invoice/create/{id}', [App\Http\Controllers\ClientInvoiceController::class, 'createInvoice']);
    Route::get('client-invoice-download/{id}', [App\Http\Controllers\ClientInvoiceController::class, 'DownloadInvoice']);

    Route::get('project', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::get('project/create', [App\Http\Controllers\ProjectController::class, 'create']);
  	Route::post('project/store', [App\Http\Controllers\ProjectController::class, 'store']);
	Route::get('project/edit/{id}', [App\Http\Controllers\ProjectController::class, 'edit']);
  	Route::post('project/update/{id}', [App\Http\Controllers\ProjectController::class, 'update']);
  	Route::delete('project/{id}', [App\Http\Controllers\TaskController::class, 'destory']);

    Route::resource('task-tracker', App\Http\Controllers\TaskController::class);
    Route::get('task-report', [App\Http\Controllers\TaskController::class, 'taskReport']);
    Route::get('view-task-progress/{id}', [App\Http\Controllers\TaskController::class, 'viewTaskProgress']);
    Route::get('check-view-progress/{id}', [App\Http\Controllers\TaskController::class, 'checkViewProgress']);
    Route::get('/edit-task-progress/{id}', [App\Http\Controllers\TaskController::class, 'taskProgressEdit']);
    Route::put('/update-task-progress/{id}', [App\Http\Controllers\TaskController::class, 'taskProgressUpdate']);
    Route::get('/edit-task/{id}', [App\Http\Controllers\TaskController::class, 'taskEdit']);
    Route::get('/admin-task-download/{id}', [App\Http\Controllers\TaskController::class, 'getDownload']);
    Route::delete('/task-doc-delete/{id}', [App\Http\Controllers\TaskController::class, 'deleteDownload']);

    Route::get('/task-taker/{id}/view', [App\Http\Controllers\TaskController::class, 'view']); //---
    Route::put('/task-takerup-progress/{id}', [App\Http\Controllers\TaskController::class, 'progressUpdate']);
    Route::put('/task-taker/{id}', [App\Http\Controllers\TaskController::class, 'updateStatus']);
    Route::post('/task-taker-progress/{id}', [App\Http\Controllers\TaskController::class, 'taskProgressStore']);


    // Route::get('/task-download/{id}', [App\Http\Controllers\Employee\TaskController::class, 'getDownload']);

    Route::get('task-export', [App\Http\Controllers\TaskController::class, 'taskExport']);

    Route::get('task-module', [App\Http\Controllers\TaskController::class, 'taskModuleForm']);
    Route::post('task-module', [App\Http\Controllers\TaskController::class, 'taskModuleStore']);
    Route::get('task-module/{id}', [App\Http\Controllers\TaskController::class, 'taskModuleEdit']);
    Route::put('task-module/{id}', [App\Http\Controllers\TaskController::class, 'taskModuleUpdate']);
    Route::delete('task-module/{id}', [App\Http\Controllers\TaskController::class, 'taskModuleDestory']);
  
  
    Route::get('blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/create', [App\Http\Controllers\BlogController::class, 'create']);
    Route::post('/blogs/store', [App\Http\Controllers\BlogController::class, 'store']);
    Route::get('/blogs/edit/{id}', [App\Http\Controllers\BlogController::class, 'editBlogs'])->name('edit.blog');
    Route::post('/blogs/update', [App\Http\Controllers\BlogController::class, 'updateBlogs']);
    Route::get('/blogs/delete/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('delete.blog');
  
    Route::get('contacts', [App\Http\Controllers\ContactController::class, 'contact']);
  	Route::get('careers', [App\Http\Controllers\ContactController::class, 'career']);


    //setting folder routes
    Route::get('company', [App\Http\Controllers\SettingController::class, 'index']);
  	Route::post('company', [App\Http\Controllers\SettingController::class, 'store']);
    Route::get('company/{id}', [App\Http\Controllers\SettingController::class, 'companyModuleEdit']);
    Route::put('company/{id}', [App\Http\Controllers\SettingController::class, 'companyModuleUpdate']);
    Route::delete('company/{id}', [App\Http\Controllers\SettingController::class, 'companyModuleDestory']);
    Route::get('/company/active/{id}',[SettingController::class,'active']);
    Route::get('/company/Inactive/{id}',[SettingController::class,'Inactive']);

    Route::get('branches', [App\Http\Controllers\SettingController::class, 'branches_index']);
    Route::post('branches', [App\Http\Controllers\SettingController::class, 'branches_store']);
  Route::get('branches/{id}', [App\Http\Controllers\SettingController::class, 'branchesModuleEdit']);
  Route::put('branches/{id}', [App\Http\Controllers\SettingController::class, 'branchesModuleUpdate']);
  Route::delete('branches/{id}', [App\Http\Controllers\SettingController::class, 'branchesModuleDestory']);
  Route::get('/branches/active/{id}',[SettingController::class,'branches_active']);
  Route::get('/branches/Inactive/{id}',[SettingController::class,'branches_Inactive']);
  
  Route::get('departments', [App\Http\Controllers\SettingController::class, 'departments_index']);
  Route::post('departments', [App\Http\Controllers\SettingController::class, 'departments_store']);
Route::get('departments/{id}', [App\Http\Controllers\SettingController::class, 'departmentsModuleEdit']);
Route::put('departments/{id}', [App\Http\Controllers\SettingController::class, 'departmentsModuleUpdate']);
Route::delete('departments/{id}', [App\Http\Controllers\SettingController::class, 'departmentsModuleDestory']);
Route::get('/department/active/{id}',[SettingController::class,'departments_active']);
Route::get('/department/Inactive/{id}',[SettingController::class,'departments_Inactive']);


Route::get('nationality', [App\Http\Controllers\SettingController::class, 'nationality_index']);
Route::post('nationality', [App\Http\Controllers\SettingController::class, 'nationality_store']);
Route::get('nationality/{id}', [App\Http\Controllers\SettingController::class, 'nationalityModuleEdit']);
Route::put('nationality/{id}', [App\Http\Controllers\SettingController::class, 'nationalityModuleUpdate']);
Route::delete('nationality/{id}', [App\Http\Controllers\SettingController::class, 'nationalityModuleDestory']);
Route::get('/nationality/active/{id}',[SettingController::class,'nationality_active']);
Route::get('/nationality/Inactive/{id}',[SettingController::class,'nationality_Inactive']);


Route::get('religion', [App\Http\Controllers\SettingController::class, 'religion_index']);
Route::post('religion', [App\Http\Controllers\SettingController::class, 'religion_store']);
Route::get('religion/{id}', [App\Http\Controllers\SettingController::class, 'religionModuleEdit']);
Route::put('religion/{id}', [App\Http\Controllers\SettingController::class, 'religionModuleUpdate']);
Route::delete('religion/{id}', [App\Http\Controllers\SettingController::class, 'religionModuleDestory']);
Route::get('/religion/active/{id}',[SettingController::class,'religion_active']);
Route::get('/religion/Inactive/{id}',[SettingController::class,'religion_Inactive']);
//qualification
Route::get('qualification', [App\Http\Controllers\SettingController::class, 'qualification_index']);
Route::post('qualification', [App\Http\Controllers\SettingController::class, 'qualification_store']);
Route::get('qualification/{id}', [App\Http\Controllers\SettingController::class, 'qualificationModuleEdit']);
Route::put('qualification/{id}', [App\Http\Controllers\SettingController::class, 'qualificationModuleUpdate']);
Route::delete('qualification/{id}', [App\Http\Controllers\SettingController::class, 'qualificationModuleDestory']);
Route::get('/qualification/active/{id}',[SettingController::class,'qualification_active']);
Route::get('/qualification/Inactive/{id}',[SettingController::class,'qualification_Inactive']);


//position

Route::get('position', [App\Http\Controllers\SettingController::class, 'position_index']);
Route::post('position', [App\Http\Controllers\SettingController::class, 'position_store']);
Route::get('position/{id}', [App\Http\Controllers\SettingController::class, 'positionModuleEdit']);
Route::put('position/{id}', [App\Http\Controllers\SettingController::class, 'positionModuleUpdate']);
Route::delete('position/{id}', [App\Http\Controllers\SettingController::class, 'positionModuleDestory']);
Route::get('/position/active/{id}',[SettingController::class,'position_active']);
Route::get('/position/Inactive/{id}',[SettingController::class,'position_Inactive']);

//professions

Route::get('professions', [App\Http\Controllers\SettingController::class, 'professions_index']);
Route::post('professions', [App\Http\Controllers\SettingController::class, 'professions_store']);
Route::get('professions/{id}', [App\Http\Controllers\SettingController::class, 'professionsModuleEdit']);
Route::put('professions/{id}', [App\Http\Controllers\SettingController::class, 'professionsModuleUpdate']);
Route::delete('professions/{id}', [App\Http\Controllers\SettingController::class, 'professionsModuleDestory']);
Route::get('/professions/active/{id}',[SettingController::class,'professions_active']);
Route::get('/professions/Inactive/{id}',[SettingController::class,'professions_Inactive']);

//category

Route::get('category', [App\Http\Controllers\SettingController::class, 'category_index']);
Route::post('category', [App\Http\Controllers\SettingController::class, 'category_store']);
Route::get('category/{id}', [App\Http\Controllers\SettingController::class, 'categoryModuleEdit']);
Route::put('category/{id}', [App\Http\Controllers\SettingController::class, 'categoryModuleUpdate']);
Route::delete('category/{id}', [App\Http\Controllers\SettingController::class, 'categoryModuleDestory']);
Route::get('/category/active/{id}',[SettingController::class,'category_active']);
Route::get('/category/Inactive/{id}',[SettingController::class,'category_Inactive']);


//sponsortype

Route::get('sponsortype', [App\Http\Controllers\SettingController::class, 'sponsortype_index']);
Route::post('sponsortype', [App\Http\Controllers\SettingController::class, 'sponsortype_store']);
Route::get('sponsortype/{id}', [App\Http\Controllers\SettingController::class, 'sponsortypeModuleEdit']);
Route::put('sponsortype/{id}', [App\Http\Controllers\SettingController::class, 'sponsortypeModuleUpdate']);
Route::delete('sponsortype/{id}', [App\Http\Controllers\SettingController::class, 'sponsortypeModuleDestory']);
Route::get('/sponsortype/active/{id}',[SettingController::class,'sponsortype_active']);
Route::get('/sponsortype/Inactive/{id}',[SettingController::class,'sponsortype_Inactive']);


Route::get('martial', [App\Http\Controllers\SettingController::class, 'martial_index']);
Route::post('martial', [App\Http\Controllers\SettingController::class, 'martial_store']);
Route::get('martial/{id}', [App\Http\Controllers\SettingController::class, 'martialModuleEdit']);
Route::put('martial/{id}', [App\Http\Controllers\SettingController::class, 'martialModuleUpdate']);
Route::delete('martial/{id}', [App\Http\Controllers\SettingController::class, 'martialModuleDestory']);
Route::get('/martial/active/{id}',[SettingController::class,'martial_active']);
Route::get('/martial/Inactive/{id}',[SettingController::class,'martial_Inactive']);

Route::get('loan_type', [App\Http\Controllers\SettingController::class, 'loan_index']);
Route::post('loan_type', [App\Http\Controllers\SettingController::class, 'loan_store']);
Route::get('loan_type/{id}', [App\Http\Controllers\SettingController::class, 'loanModuleEdit']);
Route::put('loan_type/{id}', [App\Http\Controllers\SettingController::class, 'loanModuleUpdate']);
Route::delete('loan_type/{id}', [App\Http\Controllers\SettingController::class, 'loanModuleDestory']);
Route::get('/loan_type/active/{id}',[SettingController::class,'loan_active']);
Route::get('/loan_type/Inactive/{id}',[SettingController::class,'loan_Inactive']);

Route::get('termination', [App\Http\Controllers\SettingController::class, 'termination_index']);
Route::post('termination', [App\Http\Controllers\SettingController::class, 'termination_store']);
Route::get('termination/{id}', [App\Http\Controllers\SettingController::class, 'terminationModuleEdit']);
Route::put('termination/{id}', [App\Http\Controllers\SettingController::class, 'terminationModuleUpdate']);
Route::delete('termination/{id}', [App\Http\Controllers\SettingController::class, 'terminationModuleDestory']);
Route::get('/termination/active/{id}',[SettingController::class,'termination_active']);
Route::get('/termination/Inactive/{id}',[SettingController::class,'termination_Inactive']);

Route::get('vacation_type', [App\Http\Controllers\SettingController::class, 'vacation_index']);
Route::post('vacation_type', [App\Http\Controllers\SettingController::class, 'vacation_store']);
Route::get('vacation_type/{id}', [App\Http\Controllers\SettingController::class, 'vacationModuleEdit']);
Route::put('vacation_type/{id}', [App\Http\Controllers\SettingController::class, 'vacationModuleUpdate']);
Route::delete('vacation_type/{id}', [App\Http\Controllers\SettingController::class, 'vacationModuleDestory']);
Route::get('/vacation_type/active/{id}',[SettingController::class,'vacation_active']);
Route::get('/vacation_type/Inactive/{id}',[SettingController::class,'vacation_Inactive']);

Route::get('bank', [App\Http\Controllers\SettingController::class, 'bank_index']);
Route::post('bank', [App\Http\Controllers\SettingController::class, 'bank_store']);
Route::get('bank/{id}', [App\Http\Controllers\SettingController::class, 'bankModuleEdit']);
Route::put('bank/{id}', [App\Http\Controllers\SettingController::class, 'bankModuleUpdate']);
Route::delete('bank/{id}', [App\Http\Controllers\SettingController::class, 'bankModuleDestory']);
Route::get('/bank/active/{id}',[SettingController::class,'bank_active']);
Route::get('/bank/Inactive/{id}',[SettingController::class,'bank_Inactive']);

///setup folder routes
//insurance
Route::get('insurance', [App\Http\Controllers\SetupController::class, 'insurance_index']);
Route::post('insurance', [App\Http\Controllers\SetupController::class, 'insurance_store']);
Route::get('insurance/{id}', [App\Http\Controllers\SetupController::class, 'insuranceModuleEdit']);
Route::put('insurance/{id}', [App\Http\Controllers\SetupController::class, 'insuranceModuleUpdate']);
Route::delete('insurance/{id}', [App\Http\Controllers\SetupController::class, 'insuranceModuleDestory']);
Route::get('/insurance/active/{id}',[SetupController::class,'insurance_active']);
Route::get('/insurance/Inactive/{id}',[SetupController::class,'insurance_Inactive']);

//end of service
Route::get('service', [App\Http\Controllers\SetupController::class, 'service_index']);
Route::post('service', [App\Http\Controllers\SetupController::class, 'service_store']);
Route::get('service/{id}', [App\Http\Controllers\SetupController::class, 'serviceModuleEdit']);
Route::put('service/{id}', [App\Http\Controllers\SetupController::class, 'serviceModuleUpdate']);
Route::delete('service/{id}', [App\Http\Controllers\SetupController::class, 'serviceModuleDestory']);
Route::get('/service/active/{id}',[SetupController::class,'service_active']);
Route::get('/service/Inactive/{id}',[SetupController::class,'service_Inactive']);
//vacation
Route::get('vacations', [App\Http\Controllers\SetupController::class, 'vacation_index']);
Route::post('vacations', [App\Http\Controllers\SetupController::class, 'vacation_store']);
Route::get('vacations/{id}', [App\Http\Controllers\SetupController::class, 'vacationModuleEdit']);
Route::put('vacations/{id}', [App\Http\Controllers\SetupController::class, 'vacationModuleUpdate']);
Route::delete('vacations/{id}', [App\Http\Controllers\SetupController::class, 'vacationModuleDestory']);
Route::get('/vacations/active/{id}',[SetupController::class,'vacation_active']);
Route::get('/vacations/Inactive/{id}',[SetupController::class,'vacation_Inactive']);

//ticket
Route::get('ticket', [App\Http\Controllers\SetupController::class, 'ticket_index']);
Route::post('ticket', [App\Http\Controllers\SetupController::class, 'ticket_store']);
Route::get('ticket/{id}', [App\Http\Controllers\SetupController::class, 'ticketModuleEdit']);
Route::put('ticket/{id}', [App\Http\Controllers\SetupController::class, 'ticketModuleUpdate']);
Route::delete('ticket/{id}', [App\Http\Controllers\SetupController::class, 'ticketModuleDestory']);
Route::get('/ticket/active/{id}',[SetupController::class,'ticket_active']);
Route::get('/ticket/Inactive/{id}',[SetupController::class,'ticket_Inactive']);

//overtime
Route::get('overtime', [App\Http\Controllers\SetupController::class, 'overtime_index']);
Route::post('overtime', [App\Http\Controllers\SetupController::class, 'overtime_store']);
Route::get('overtime/{id}', [App\Http\Controllers\SetupController::class, 'overtimeModuleEdit']);
Route::put('overtime/{id}', [App\Http\Controllers\SetupController::class, 'overtimeModuleUpdate']);
Route::delete('overtime/{id}', [App\Http\Controllers\SetupController::class, 'overtimeModuleDestory']);
Route::get('/overtime/active/{id}',[SetupController::class,'overtime_active']);
Route::get('/overtime/Inactive/{id}',[SetupController::class,'overtime_Inactive']);

//absent
Route::get('absent', [App\Http\Controllers\SetupController::class, 'absent_index']);
Route::post('absent', [App\Http\Controllers\SetupController::class, 'absent_store']);
Route::get('absent/{id}', [App\Http\Controllers\SetupController::class, 'absentModuleEdit']);
Route::put('absent/{id}', [App\Http\Controllers\SetupController::class, 'absentModuleUpdate']);
Route::delete('absent/{id}', [App\Http\Controllers\SetupController::class, 'absentModuleDestory']);
Route::get('/absent/active/{id}',[SetupController::class,'absent_active']);
Route::get('/absent/Inactive/{id}',[SetupController::class,'absent_Inactive']);


//latededuction
Route::get('latededuction', [App\Http\Controllers\SetupController::class, 'latededuction_index']);
Route::post('latededuction', [App\Http\Controllers\SetupController::class, 'latededuction_store']);
Route::get('latededuction/{id}', [App\Http\Controllers\SetupController::class, 'latedeductionModuleEdit']);
Route::put('latededuction/{id}', [App\Http\Controllers\SetupController::class, 'latedeductionModuleUpdate']);
Route::delete('latededuction/{id}', [App\Http\Controllers\SetupController::class, 'latedeductionModuleDestory']);
Route::get('/latededuction/active/{id}',[SetupController::class,'latededuction_active']);
Route::get('/latededuction/Inactive/{id}',[SetupController::class,'latededuction_Inactive']);


    //loan
    Route::get('/loan',[LoanController::class,'index']);
    Route::post('/loan',[LoanController::class,'store']);
    Route::get('/show',[LoanController::class,'show']);
    Route::get('/loan/delete/{id}',[LoanController::class,'destroy']);


// vacation module

Route::get('/vacation_entry',[Vacation_module::class,'index']);
Route::post('/vacation_entry',[Vacation_module::class,'store']);
Route::get('/vacation_entry/delete/{id}',[Vacation_module::class,'destroy']);



// Route::get('/show',[Vacation_module::class,'show']);
// Route::get('/loan/delete/{id}',[Vacation_module::class,'destroy']);

Route::get('/vacation_inquiry',[Vacation_module::class,'inquiry_index']);
Route::post('/vacation_inquiry',[Vacation_module::class,'inquiry_store']);
Route::get('/vacation_inquiry/delete/{id}',[Vacation_module::class,'destroy_inquiry']);




Route::get('/vacation_salary',[Vacation_module::class,'salary_index']);
Route::post('/vacation_salary',[Vacation_module::class,'salary_store']);
Route::get('/vacation_salary/delete/{id}',[Vacation_module::class,'destroy_salary']);



//government
Route::get('/government',[GovernmentController::class,'index']);
Route::post('/government',[GovernmentController::class,'store']);
Route::get('/government/delete/{id}',[GovernmentController::class,'destroy']);



//training

Route::get('/training',[TrainingController::class,'index']);
Route::post('/training',[TrainingController::class,'store']);
Route::get('/training/{id}',[TrainingController::class,'destroy']);
Route::get('/training/active/{id}',[TrainingController::class,'active']);
Route::get('/training/Inactive/{id}',[TrainingController::class,'inactive']);

//equipment
Route::get('/equipment',[EquipmentController::class,'index']);
Route::post('/equipment',[EquipmentController::class,'store']);
Route::get('/equipment/show',[EquipmentController::class,'show']);
Route::get('/equipment/{id}',[EquipmentController::class,'destroy']);
Route::get('/equipment/active/{id}',[EquipmentController::class,'active']);
Route::get('/equipment/Inactive/{id}',[EquipmentController::class,'inactive']);

//report

Route::get('/employee_status',[ReportController::class,'status_index']);
Route::get('/employee_allowance',[ReportController::class,'allowance_index']);
Route::get('/employee_document',[ReportController::class,'document_index']);
Route::get('/employee_absent',[ReportController::class,'absent_index']);
Route::get('/employee_loan',[ReportController::class,'loan_index']);
Route::get('/employee_payroll',[ReportController::class,'payroll_index']);
Route::get('/employee_monthly_accural',[ReportController::class,'accural_index']);
Route::get('/employee_account',[ReportController::class,'account_index']);









});

Route::middleware(['logout', 'role:Admin'])->group(function() {
    Route::get('admin/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);
});

Route::middleware(['logout', 'role:Employee'])->group(function() {
    Route::get('/emp/dashboard', [App\Http\Controllers\UserDashboardController::class, 'dashboard']);
});

Route::middleware(['logout', 'role:HR'])->group(function() {
    Route::get('/hr/dashboard', [App\Http\Controllers\UserDashboardController::class, 'dashboard']);
});

Route::middleware(['logout', 'role:Manager'])->group(function() {
    Route::get('/manager/dashboard', [App\Http\Controllers\Manager\ManagerDashboardController::class, 'dashboard']);
});

Route::middleware(['logout', 'role:Manager,Employee,HR'])->group(function() {

    Route::resource('leave', App\Http\Controllers\Employee\LeaveController::class);

    Route::get('/task', [App\Http\Controllers\Employee\TaskController::class, 'index']);
    Route::get('/task/{id}/edit', [App\Http\Controllers\Employee\TaskController::class, 'edit']);
    Route::put('/task/{id}', [App\Http\Controllers\Employee\TaskController::class, 'update']);
    Route::get('/task-progress/{id}', [App\Http\Controllers\Employee\TaskController::class, 'taskProgressEdit']);
    Route::put('/task-progress/{id}', [App\Http\Controllers\Employee\TaskController::class, 'progressUpdate']);
    Route::get('/task-download/{id}', [App\Http\Controllers\Employee\TaskController::class, 'getDownload']);
    Route::post('/task-progress/{id}', [App\Http\Controllers\Employee\TaskController::class, 'taskProgressStore']);

    Route::post('/checkin', [App\Http\Controllers\UserDashboardController::class, 'checkInTimeStore']);
    Route::put('/checkout', [App\Http\Controllers\UserDashboardController::class, 'checkOutTimeUpdate']);

    Route::post('/breakin', [App\Http\Controllers\UserDashboardController::class, 'breakInTimeStore']);
    Route::put('/breakout', [App\Http\Controllers\UserDashboardController::class, 'breakOutTimeUpdate']);

    Route::get('/timebreaker/{id}', [App\Http\Controllers\UserDashboardController::class, 'viewTime']);
    Route::put('/timetracker/{id}', [App\Http\Controllers\UserDashboardController::class, 'updateTime']);
 

});


Route::get('/monthly_report/{id}', [App\Http\Controllers\UserDashboardController::class, 'MonthlyReport']);


Route::middleware(['logout', 'role:Employee'])->group(function() {
    
    

});

//----------------------- Client Routes-----------------------------------------------
// Route::get('/ClientLogin', [App\Http\Controllers\Auth\LoginController::class, 'showClientLoginForm']);
// Route::post('/ClientLogin', [App\Http\Controllers\Auth\LoginController::class, 'clientLogin']);
// Route::post('/ClientLogout', [App\Http\Controllers\Auth\LoginController::class, 'clientLogout']);

// Route::middleware(['client', 'logout'])->group(function() {

//     Route::get('/ClientDashboard', [App\Http\Controllers\Client\DashboardController::class, 'dashboard']);

//     Route::get('/client-project',  [App\Http\Controllers\Client\ProjectController::class, 'index']);
// });



// Route::view('/home', 'home')->middleware('auth');
// Route::view('/clientLogin', 'client_login');
// Route::view('/writer', 'writer');


// Route::get('/loginmail', function () {
//     return view('layouts/login_mail');
// });

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();


//-------------------------- Artisan commands
Route::get('/migrate', function () {
    Artisan::call('migrate', [
       '--force' => true
    ]);

    return 'Migrate Database Successfully!';
});

// Route::get('/config-cache', function() {

//     $exitCode = Artisan::call('config:cache');

//     return "Config Cache Successfully";
// });

Route::get('/storage-link', function() {

    Artisan::call('storage:link');

    return "Storage Link Successfully";
});

// Route::get('/dbseed', function () {
//     Artisan::call('db:seed', [
//        '--force' => true
//     ]);

//     return 'DB Seed completed!';
// });


// Route::get('/composer-update', function () {
//     Artisan::call('composer update', [
//        '--force' => true
//     ]);

//     return 'Composer Updated!';
// });
