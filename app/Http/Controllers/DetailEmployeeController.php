<?php

namespace App\Http\Controllers;

use App\Models\DetailEmployee;
use Illuminate\Http\Request;

class DetailEmployeeController extends Controller
{
    public function store(Request $request)
    {
        $contactdetail=new DetailEmployee();
        $contactdetail->date_of_birth=$request->date_of_birth;
        $contactdetail->gender=$request->gender;
        $contactdetail->nationality=$request->nationality;
        $contactdetail->religion=$request->religion;
        $contactdetail->qualification=$request->qualification;
        $contactdetail->profession=$request->profession;
        $contactdetail->martial_status=$request->martial_status;
        $contactdetail->addition_skills=$request->addition_skills;
        $contactdetail->phone=$request->phone;
        $contactdetail->email=$request->email;
        $contactdetail->sponsor=$request->sponsor;
        $contactdetail->type_of_sponsor=$request->type_of_sponsor;
        $contactdetail->address_kingdom=$request->address_kingdom;
        $contactdetail->address_abroad=$request->address_abroad;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('employee_contact',$imagename);
        $contactdetail->image=$imagename;
        $contactdetail->save();

        return redirect()->back()->with('success', 'Contact form has been saved');



    }





}
