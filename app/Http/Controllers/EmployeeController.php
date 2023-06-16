<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Branches;
use App\Models\Category;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\DetailEmployee;
use App\Models\Religion;
use App\Models\Nationality;
use App\Models\Qualification;



use App\Models\EmployeeDocuments;
use App\Models\Insurance;
use App\Models\Position;
use App\Models\Profession;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\Vacation;
use Illuminate\Support\Facades\DB;
use Matrix\Operators\Division;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.list', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $employee = DB::table('employees')->latest()->first();
        if(!$employee){
          	$employees = Employee::all();
          	$qualification = Qualification::all();
          	$profession = Profession::all();
            $company = Company::all();
            $branch = Branches::all();
            $department = Department::all();
            $job = Position::all();
            $category = Category::all();
            $insurance = Insurance::all();
            $service = Service::all();
            $vacation = Vacation::all();
            $ticket = Ticket::all();
        	// $nationality = Nationality::select('id','name')->get();
        	$nationality = Nationality::all();
        	// $religion = Religion::select('id','name')->get();
        	$religion = Religion::all();
            $bank=Bank::all();



            $newEmployeeNo = "EMP-000001";
            return view('employee.create', compact('newEmployeeNo', 'employees',
            'nationality','religion','qualification','profession','company','branch','department',
            'job','category','insurance','service','vacation','ticket','bank'));
        }

        $lastEmployeeNo = DB::table('employees')->orderBy('id', 'desc')->pluck('employee_no')->first();
        $prefix = "EMP-";
        $employee_no = preg_replace("/[^0-9\.]/", '', $lastEmployeeNo);
        $newEmployeeNo = $prefix . sprintf('%06d', $employee_no+1);

        $employees = Employee::all();
        $nationality = Nationality::select('id', 'name')->get();
        $religion = Religion::select('id','name')->get();
        $qualification = Qualification::all();
        $profession = Profession::all();
        $company = Company::all();
        $branch = Branches::all();
        $department = Department::all();
        $job = Position::all();
        $category = Category::all();
        $insurance = Insurance::all();
        $service = Service::all();
        $vacation = Vacation::all();
        $ticket = Ticket::all();
        $bank=Bank::all();



        




        return view('employee.create', ['newEmployeeNo'=>$newEmployeeNo, 'employees'=>$employees,'nationality'=>$nationality,
        'religion'=>$religion,'qualification'=>$qualification,'profession'=>$profession,'company'=>$company,
        'branch'=>$branch,'department'=>$department,'job'=>$job,'category'=>$category,'insurance'=>$insurance,
        'service'=>$service,'vacation'=>$vacation,'ticket'=>$ticket ,'bank'=>$bank]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
     
    
        $this->validate($request, [
            'employee_no' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'first_name_arb' => 'required',
            'grand_name_arb' => 'required',
            'family_name' => 'required',
            'middle_name_arb' => 'required',
            'family_name_arb' => 'required',

            // 'file.*' => 'mimes:jpeg, png, jpg, pdf, docx, doc'
        ],
        // [
        //     'profile_image.mimes'=> 'Image must be in jpeg, png, jpg',
        //     'designation_id.required' => 'Designation is required',
        //     'employee_id.required' => 'Supervisor is required'
        //     // 'file.mimes' => 'File must be jpeg, png, jpg, pdf, docx, doc'
        // ]
        );
    
        $employee = new Employee;

        $employee->employee_no = $request->employee_no;
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->first_name_arb = $request->first_name_arb;
        $employee->grand_name_arb = $request->grand_name_arb;
        $employee->family_name = $request->family_name;
        $employee->middle_name_arb = $request->middle_name_arb;
        $employee->family_name_arb = $request->family_name_arb;

        $employee->date_of_birth = $request->date_of_birth;
        $employee->gender = $request->gender;
        $employee->nationality = $request->nationality;
        $employee->religion = $request->religion;
        $employee->qualification = $request->qualification;
        $employee->professions = $request->professions;
        $employee->martial_status = $request->martial_status;
        $employee->addition_skills = $request->addition_skills;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->sponsor = $request->sponsor;
        $employee->type_of_sponsor = $request->type_of_sponsor;
        $employee->address_kingdom = $request->address_kingdom;
        $employee->address_abroad = $request->address_abroad;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('employee_contact',$imagename);
        $employee->image=$imagename;

        $employee->contract_period = $request->input('contract_period');
        $employee->join_date = $request->input('join_date');
        $employee->expiry_date = $request->input('expiry_date');
        $employee->active_form = $request->input('active_form');
        $employee->family_mamber = $request->input('family_mamber');
        $employee->no_of_ticket = $request->input('no_of_ticket');
        $employee->ticket_values = $request->input('ticket_values');
        $employee->total = $request->input('total');
        $employee->notes_contract = $request->input('notes_contract');
        $employee->company_contract = $request->input('company_contract');
        $employee->division = $request->input('division');
        $employee->branch = $request->input('branch');
        $employee->department = $request->input('department');
        $employee->job_title = $request->input('job_title');
        $employee->category = $request->input('category');
        $employee->allocation = $request->input('allocation');
        $employee->gl_code = $request->input('gl_code');
        $employee->for_index = $request->input('for_index');
        $employee->hijri_1 = $request->input('hijri_1');
        $employee->hijri_2 = $request->input('hijri_2');
        $employee->statuses = $request->input('statuses');

        $employee->passport = $request->input('passport');
        $employee->passport_issuedate = $request->input('passport_issuedate');
        $employee->passport_expdate = $request->input('passport_expdate');
        $employee->passport_issueat = $request->input('passport_issueat');
        $employee->Iqama = $request->input('Iqama');
        $employee->Iqama_issuedate = $request->input('Iqama_issuedate');
        $employee->Iqama_expdate = $request->input('Iqama_expdate');
        $employee->Iqama_issueat = $request->input('Iqama_issueat');
        $employee->work = $request->input('work');
        $employee->work_issuedate = $request->input('work_issuedate');
        $employee->work_expdate = $request->input('work_expdate');
        $employee->work_issueat = $request->input('work_issueat');
        $employee->driving = $request->input('driving');
        $employee->driving_issuedate = $request->input('driving_issuedate');
        $employee->driving_expdate = $request->input('driving_expdate');
        $employee->driving_issueat = $request->input('driving_issueat');
        $employee->vehicle = $request->input('vehicle');
        $employee->vehicle_issuedate = $request->input('vehicle_issuedate');
        $employee->vehicle_expdate = $request->input('vehicle_expdate');
        $employee->vehicle_issueat = $request->input('vehicle_issueat');
        $employee->gosi_allowance = $request->input('gosi_allowance');
        $employee->gosi_issuedate = $request->input('gosi_issuedate');
        $employee->gosi_issueat = $request->input('gosi_issueat');
        $employee->profession = $request->input('profession');

        $employee->salary = $request->input('salary');
        $employee->housing = $request->input('housing');
        $employee->mobile = $request->input('mobile');
        $employee->badal = $request->input('badal');
        $employee->transport = $request->input('transport');
        $employee->other = $request->input('other');
        $employee->gosi = $request->input('gosi');
        $employee->eos = $request->input('eos');
        $employee->vacation = $request->input('vacation');
        $employee->ticket = $request->input('ticket');
        $employee->housing_allowance = $request->input('housing_allowance');
        $employee->family = $request->input('family');

        $employee->name = $request->input('name');
        $employee->relation = $request->input('relation');
        $employee->dob = $request->input('dob');
        $employee->passport_no = $request->input('passport_no');
        $employee->pass_issue_date = $request->input('pass_issue_date');
        $employee->pass_expiry_date = $request->input('pass_expiry_date');

        $employee->med_card = $request->input('med_card');
        $employee->issue_date = $request->input('issue_date');
        $employee->exp_date = $request->input('exp_date');
        $employee->company = $request->input('company');
        $employee->class = $request->input('class');
        $employee->blood = $request->input('blood');
        $employee->notes = $request->input('notes');
        $employee->plate_no = $request->input('plate_no');
        $employee->asset_no = $request->input('asset_no');
        $employee->vechile = $request->input('vechile');
        $employee->isthimara_issue = $request->input('isthimara_issue');
        $employee->isthimara_expiry = $request->input('isthimara_expiry');
        $employee->note = $request->input('note');


        $employee->bank_name = $request->input('bank_name');
        $employee->account_no = $request->input('account_no');
        $employee->branch_name = $request->input('branch_name');
        $employee->account_code = $request->input('account_code');
        $employee->bank_code = $request->input('bank_code');
        $employee->notes_bank = $request->input('notes_bank');
        $employee->address = $request->input('address');
        $employee->summary = $request->input('summary');
        $employee->reason = $request->input('reason');



        $employee->save();
        // $employee->mobile_no = $request->mobile_no;
        // $employee->home_phone = $request->home_phone;
        // $employee->emergency_contact = $request->emergency_contact;
        // $employee->email = $request->email;
        // $employee->other_email = $request->other_email;
        // $employee->country = $request->country;
        // $employee->province_state = $request->province_state;
        // $employee->city = $request->city;
        // $employee->nationality = $request->nationality;
        // $employee->postal_code = $request->postal_code;
        // $employee->address = $request->address;
        // $employee->notes = $request->notes;
        // $employee->designation_id = $request->designation_id;
        // $employee->salary = $request->salary;
        // $employee->joining_date = $request->joining_date;
        // $employee->ending_date = $request->ending_date;
        // $employee->employee_id = $request->employee_id;
        // $employee->working_time_start = $request->working_time_start;
        // $employee->working_time_end = $request->working_time_end;
        // $employee->termination_date = $request->termination_date;
        // $employee->job_status = $request->job_status;
        // $employee->probation_period_start = $request->probation_period_start;
        // $employee->probation_period_end = $request->probation_period_end;
        // $employee->internship_period_start = $request->internship_period_start;
        // $employee->internship_period_end = $request->internship_period_end;

        // if ($request->hasFile('profile_image')) {
        //     $image = $request->file('profile_image');
        //     $name = time().'_'.$image->getClientOriginalName();
        //     $destinationPath = public_path('/storage/profile_images');
        //     $imagePath = $destinationPath. "/".  $name;
        //     $image->move($destinationPath, $name);
        //     $employee->profile_image = $name;
        // }

        // if($employee->save())
        // {
        //     foreach ($request->file ? : [] as $file) {
        //         $filename =  time().'_'.$file->getClientOriginalName();
        //         $destinationPath = public_path('/storage/employee_documents');
        //         $filePath = $destinationPath. "/".  $filename;
        //         $file->move($destinationPath, $filename);
        //         EmployeeDocuments::create([
        //             'employee_id' => $employee->id,
        //             'file' => $filename
        //         ]);
        //     }
        // }

        return redirect()->back()->with('success', 'Record has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $employee = Employee::find($id);

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $employeeDocs = Employee::find($id)->documents;

        $emps = Employee::select('id', 'first_name', 'middle_name', 'last_name')->get();
        $designations = Designation::select('id', 'title')->get();

        return view('employee.edit', compact('employee', 'employeeDocs', 'emps', 'designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'mobile_no' => "required|unique:employees,mobile_no,$id",
            'email' => "required|unique:employees,email,$id",
            'profile_image' => 'image|mimes:jpeg,png,jpg',
            'designation_id' => 'required',
            'employee_id' => 'required',
            'job_status' => 'required',
            'salary' => 'nullable|numeric',
            // 'file.*' => 'mimes:jpeg, png, jpg, pdf, docx, doc'
        ],
        [
            'profile_image.mimes'=> 'Image must be in jpeg, png, jpg',
            'designation_id.required' => 'Designation is required',
            'employee_id.required' => 'Supervisor is required'
        ]);


        $employee = Employee::find($id);

        $employee->first_name = $request->first_name;
      
        $employee->last_name = $request->last_name;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->gender = $request->gender;
        $employee->marital_status = $request->marital_status;
        $employee->qualification = $request->qualification;
        $employee->cnic = $request->cnic;
        $employee->mobile_no = $request->mobile_no;
        $employee->home_phone = $request->home_phone;
        $employee->emergency_contact = $request->emergency_contact;
        $employee->email = $request->email;
        $employee->other_email = $request->other_email;
        $employee->country = $request->country;
        $employee->province_state = $request->province_state;
        $employee->city = $request->city;
        $employee->nationality = $request->nationality;
        $employee->postal_code = $request->postal_code;
        $employee->address = $request->address;
        $employee->notes = $request->notes;
        $employee->designation_id = $request->designation_id;
        $employee->salary = $request->salary;
        $employee->joining_date = $request->joining_date;
        $employee->ending_date = $request->ending_date;
        $employee->employee_id = $request->employee_id;
        $employee->working_time_start = $request->working_time_start;
        $employee->working_time_end = $request->working_time_end;
        $employee->termination_date = $request->termination_date;
        $employee->job_status = $request->job_status;
        $employee->employee_status = $request->status;
        $employee->probation_period_start = $request->probation_period_start;
        $employee->probation_period_end = $request->probation_period_end;
        $employee->internship_period_start = $request->internship_period_start;
        $employee->internship_period_end = $request->internship_period_end;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time().'_'.$image->getClientOriginalName();
            $destinationPath = public_path('/storage/profile_images');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $old_image = $employee->profile_image;
            $employee->profile_image = $name;

            Storage::disk('profile-image')->delete($old_image);
        }

        if($employee->save())
        {
            foreach ($request->file ? : [] as $file) {
                $filename =  time().'_'.$file->getClientOriginalName();
                $destinationPath = public_path('/storage/employee_documents');
                $filePath = $destinationPath. "/".  $filename;
                $file->move($destinationPath, $filename);
                EmployeeDocuments::create([
                    'employee_id' => $employee->id,
                    'file' => $filename
                ]);
            }
        }

        $request->session()->flash('update', 'Record has been updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        // "profile-image" is a custom disk name in config/filesystems.php
        Storage::disk('profile-image')->delete($employee->profile_image);

        return redirect('/employee')->with('delete', 'Record has been deleted');
    }

    public function viewDocs($id)
    {
        $employeeDoc = EmployeeDocuments::find($id);

        return view('backend.employee.file_view', compact('employeeDoc'));
    }

    public function deleteDocs($id)
    {
        DB::table('employee_documents')->where('id', $id)->delete();

        // $emp = Employee::find($id);
        // $doc = DB::table('employee_documents')->where('employee_id');

        // $file = public_path()."/storage/employee_documents/".$doc->file;

        // Storage::disk('employee-documents')->delete($file);

        return response()->json([
            'message' => 'Record delete successfully!'
          ]);
    }

    public function docDownload(Request $request, $id)
    {
        try{
            $doc = EmployeeDocuments::find($id);
            $file = public_path()."/storage/employee_documents/".$doc->file;
            $headers = array(
                'Content-Type: application/*',
            );
            return response()->download($file, $doc->file, $headers);
        }
        catch(\Exception $e){
            return view('errors.file_not_found');
        }
    }
    
   
}
