<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Branches;
use App\Models\Company;
use App\Models\Category;
use App\Models\Loan_Type;
use App\Models\Setting_Department;
use App\Models\Nationality;
use App\Models\Position;
use App\Models\Religion;
use App\Models\Qualification;
use App\Models\Profession;
use App\Models\SponsorType;
use App\Models\Martial;
use App\Models\Termination;
use App\Models\Vacation_Type;

class SettingController extends Controller
{
    public function index()
    {
        $company = DB::table('companies')->get();

        return view('settings.company.company', compact('company'));
       
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'arabic_name' => 'required',
        ]);

        DB::table('companies')->insert([
            'name' => $request->name,
            'arabic_name' => $request->arabic_name,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Record submitted successfully');
    }

    public function companyModuleEdit($id)
    {
        $company = DB::table('companies')->where('id', $id)->first();

        return response()->json($company);
    }

    public function companyModuleUpdate(Request $request, $id)
    {
        $company = DB::table('companies')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'arabic_name' => $request->arabic_name,

        ]);

        return response()->json($company);
    }

    public function companyModuleDestory($id)
    {
        DB::table('companies')->where('id', $id)->delete();

        return response()->json([
            'message' => 'Record deleted successfully!',
        ]);
    }

    public function Inactive($id)
    {
    $data=Company::find($id);
    $data->status='In-active';
    $data->save();
    return redirect()->back();

}

    public function active($id)
{
    $data=Company::find($id);
    $data->status='Active';
    $data->save();
    return redirect()->back();

}
//branches
public function branches_index()
{
    $branch = DB::table('branches')->get();

    return view('settings.branches.branches', compact('branch'));
   
}

public function branches_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('branches')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function branchesModuleEdit($id)
{
    $branch = DB::table('branches')->where('id', $id)->first();

    return response()->json($branch);
}

public function branchesModuleUpdate(Request $request, $id)
{
    $branch = DB::table('branches')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($branch);
}

public function branchesModuleDestory($id)
{
    DB::table('branches')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function branches_Inactive($id)
{
$data=Branches::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function branches_active($id)
{
$data=Branches::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}
   
//departemnt

public function departments_index()
{
    $department = DB::table('setting__departments')->get();

    return view('settings.department.department', compact('department'));
   
}

public function departments_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('setting__departments')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function departmentsModuleEdit($id)
{
    $department = DB::table('setting__departments')->where('id', $id)->first();

    return response()->json($department);
}

public function departmentsModuleUpdate(Request $request, $id)
{
    $department = DB::table('setting__departments')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($department);
}

public function departmentsModuleDestory($id)
{
    DB::table('setting__departments')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function departments_Inactive($id)
{
$data=Setting_Department::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function departments_active($id)
{
$data=Setting_Department::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


//nationality   


public function nationality_index()
{
    $nationality = DB::table('nationalities')->get();

    return view('settings.nationality.nationality', compact('nationality'));
   
}

public function nationality_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('nationalities')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function nationalityModuleEdit($id)
{
    $nationality = DB::table('nationalities')->where('id', $id)->first();

    return response()->json($nationality);
}

public function nationalityModuleUpdate(Request $request, $id)
{
    $nationality = DB::table('nationalities')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($nationality);
}

public function nationalityModuleDestory($id)
{
    DB::table('nationalities')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function nationality_Inactive($id)
{
$data=Nationality::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function nationality_active($id)
{
$data=Nationality::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}

//religion

public function religion_index()
{
    $religion = DB::table('religions')->get();

    return view('settings.religion.religion', compact('religion'));
   
}

public function religion_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('religions')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function religionModuleEdit($id)
{
    $religion = DB::table('religions')->where('id', $id)->first();

    return response()->json($religion);
}

public function religionModuleUpdate(Request $request, $id)
{
    $religion = DB::table('religions')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($religion);
}

public function religionModuleDestory($id)
{
    DB::table('religions')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function religion_Inactive($id)
{
$data=Religion::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function religion_active($id)
{
$data=Religion::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}

//qualification


public function qualification_index()
{
    $qualification = DB::table('qualifications')->get();

    return view('settings.qualification.qualification', compact('qualification'));
   
}

public function qualification_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('qualifications')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function qualificationModuleEdit($id)
{
    $qualification = DB::table('qualifications')->where('id', $id)->first();

    return response()->json($qualification);
}

public function qualificationModuleUpdate(Request $request, $id)
{
    $qualification = DB::table('qualifications')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($qualification);
}

public function qualificationModuleDestory($id)
{
    DB::table('qualifications')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function qualification_Inactive($id)
{
$data=Qualification::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function qualification_active($id)
{
$data=Qualification::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


//position


public function position_index()
{
    $position = DB::table('positions')->get();

    return view('settings.posiion.position', compact('position'));
   
}

public function position_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('positions')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function positionModuleEdit($id)
{
    $position = DB::table('positions')->where('id', $id)->first();

    return response()->json($position);
}

public function positionModuleUpdate(Request $request, $id)
{
    $position = DB::table('positions')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($position);
}

public function positionModuleDestory($id)
{
    DB::table('positions')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function position_Inactive($id)
{
$data=Position::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function position_active($id)
{
$data=Position::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}



//professions


public function professions_index()
{
    $profession = DB::table('professions')->get();

    return view('settings.profession.profession', compact('profession'));
   
}

public function professions_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('professions')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function professionsModuleEdit($id)
{
    $profession = DB::table('professions')->where('id', $id)->first();

    return response()->json($profession);
}

public function professionsModuleUpdate(Request $request, $id)
{
    $profession = DB::table('professions')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($profession);
}

public function professionsModuleDestory($id)
{
    DB::table('professions')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function professions_Inactive($id)
{
$data=Profession::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function professions_active($id)
{
$data=Profession::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


//professions


public function category_index()
{
    $category = DB::table('categories')->get();

    return view('settings.category.category', compact('category'));
   
}

public function category_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('categories')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function categoryModuleEdit($id)
{
    $category = DB::table('categories')->where('id', $id)->first();

    return response()->json($category);
}

public function categoryModuleUpdate(Request $request, $id)
{
    $category = DB::table('categories')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($category);
}

public function categoryModuleDestory($id)
{
    DB::table('categories')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function category_Inactive($id)
{
$data=Category::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function category_active($id)
{
$data=Category::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}

//sponsotype


public function sponsortype_index()
{
    $sponsortype = DB::table('sponsor_types')->get();

    return view('settings.sponsortype.sponsortype', compact('sponsortype'));
   
}

public function sponsortype_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('sponsor_types')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function sponsortypeModuleEdit($id)
{
    $sponsortype = DB::table('sponsor_types')->where('id', $id)->first();

    return response()->json($sponsortype);
}

public function sponsortypeModuleUpdate(Request $request, $id)
{
    $sponsortype = DB::table('sponsor_types')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($sponsortype);
}

public function sponsortypeModuleDestory($id)
{
    DB::table('sponsor_types')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function sponsortype_Inactive($id)
{
$data=SponsorType::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function sponsortype_active($id)
{
$data=SponsorType::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


//martial


public function martial_index()
{
    $martial = DB::table('martials')->get();

    return view('settings.martial.martial', compact('martial'));
   
}

public function martial_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('martials')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function martialModuleEdit($id)
{
    $martial = DB::table('martials')->where('id', $id)->first();

    return response()->json($martial);
}

public function martialModuleUpdate(Request $request, $id)
{
    $martial = DB::table('martials')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($martial);
}

public function martialModuleDestory($id)
{
    DB::table('martials')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function martial_Inactive($id)
{
$data=Martial::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function martial_active($id)
{
$data=Martial::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


//loan


public function loan_index()
{
    $loan = DB::table('loan__types')->get();

    return view('settings.loan.loan', compact('loan'));
   
}

public function loan_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('loan__types')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function loanModuleEdit($id)
{
    $loan = DB::table('loan__types')->where('id', $id)->first();

    return response()->json($loan);
}

public function loanModuleUpdate(Request $request, $id)
{
    $loan = DB::table('loan__types')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($loan);
}

public function loanModuleDestory($id)
{
    DB::table('loan__types')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function loan_Inactive($id)
{
$data=Loan_Type::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function loan_active($id)
{
$data=Loan_Type::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


//termination


public function termination_index()
{
    $termination = DB::table('terminations')->get();

    return view('settings.termination.termination', compact('termination'));
   
}

public function termination_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('terminations')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function terminationModuleEdit($id)
{
    $termination = DB::table('terminations')->where('id', $id)->first();

    return response()->json($termination);
}

public function terminationModuleUpdate(Request $request, $id)
{
    $termination = DB::table('terminations')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($termination);
}

public function terminationModuleDestory($id)
{
    DB::table('terminations')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function termination_Inactive($id)
{
$data=Termination::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function termination_active($id)
{
$data=Termination::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}

//vacation type


public function vacation_index()
{
    $vacation = DB::table('vacation__types')->get();

    return view('settings.vacation.vacation', compact('vacation'));
   
}

public function vacation_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('vacation__types')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function vacationModuleEdit($id)
{
    $vacation = DB::table('vacation__types')->where('id', $id)->first();

    return response()->json($vacation);
}

public function vacationModuleUpdate(Request $request, $id)
{
    $vacation = DB::table('vacation__types')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($vacation);
}

public function vacationModuleDestory($id)
{
    DB::table('vacation__types')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function vacation_Inactive($id)
{
$data=Vacation_Type::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function vacation_active($id)
{
$data=Vacation_Type::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}

//bank type


public function bank_index()
{
    $bank = DB::table('banks')->get();

    return view('settings.bank.bank', compact('bank'));
   
}

public function bank_store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'arabic_name' => 'required',
    ]);

    DB::table('banks')->insert([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    return redirect()->back()->with('success', 'Record submitted successfully');
}
  
public function bankModuleEdit($id)
{
    $bank = DB::table('banks')->where('id', $id)->first();

    return response()->json($bank);
}

public function bankModuleUpdate(Request $request, $id)
{
    $bank = DB::table('banks')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'arabic_name' => $request->arabic_name,

    ]);

    return response()->json($bank);
}

public function bankModuleDestory($id)
{
    DB::table('banks')->where('id', $id)->delete();

    return response()->json([
        'message' => 'Record deleted successfully!',
    ]);
}

public function bank_Inactive($id)
{
$data=Bank::find($id);
$data->status='In-active';
$data->save();
return redirect()->back();

}

public function bank_active($id)
{
$data=Bank::find($id);
$data->status='Active';
$data->save();
return redirect()->back();

}


}
