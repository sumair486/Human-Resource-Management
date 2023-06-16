<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Government;
use App\Models\Martial;
use App\Models\Nationality;
use App\Models\Profession;
use App\Models\Qualification;
use Illuminate\Http\Request;

class GovernmentController extends Controller
{
    public function index()
    {
        $marital_status=Martial::all();
        $nationality=Nationality::all();
        $qualification=Qualification::all();
        $profession=Profession::all();
        $employee=Employee::all();
        $government=Government::all();
        return view('government.government',compact('profession','qualification','nationality','marital_status','employee','government'));
    }
    public function store(Request $request)

    {
        $government = new Government();
        $government->ref_no = $request->ref_no;
        $government->date = $request->date;
        $government->employee = $request->employee;
        $government->nationality = $request->nationality;
        $government->sex = $request->sex;
        $government->birth_date = $request->birth_date;
        $government->kingdom_entry = $request->kingdom_entry;
        $government->marital = $request->marital;
        $government->passport_no = $request->passport_no;
        $government->passport_issue = $request->passport_issue;
        $government->passport_expiry = $request->passport_expiry;
        $government->passport_place = $request->passport_place;
        $government->iqama_no = $request->iqama_no;
        $government->iqama_issue = $request->iqama_issue;
        $government->iqama_expiry = $request->iqama_expiry;
        $government->iqama_place = $request->iqama_place;
        $government->qualification = $request->qualification;
        $government->certificate = $request->certificate;
        $government->profession = $request->profession;
        $government->gover_as = $request->gover_as;
        $government->experience = $request->experience;
        $government->sponsor = $request->sponsor;
        $government->labour_employee = $request->labour_employee;
        $government->business = $request->business;
        $government->commercial = $request->commercial;
        $government->issue_date = $request->issue_date;
        $government->issue = $request->issue;
        $government->salary = $request->salary;
        $government->other = $request->other;
        $government->permit = $request->permit;
        $government->city = $request->city;
        $government->district = $request->district;
        $government->street = $request->street;
        $government->tel = $request->tel;
        $government->box = $request->box;
        $government->zip_code = $request->zip_code;
        // dd($government);
        $government->save();

        return redirect()->back()->with('success', 'Record has been created successfully!');

    }

    public function destroy($id)
    {
        $government=Government::find($id);
        if(!is_null($government)){
            $government->delete();
            return redirect()->back()->with('success','Successfully deleted');
        }
    }
}
