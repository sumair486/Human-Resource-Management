<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{
    public function index()
    {
        return view('employee.equipment.index');
    }

    public function store(Request $request)
    {
        $equipment=new Equipment();
        $equipment->date=$request->date;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('equipment_images',$imagename);
        $equipment->file=$imagename;
        $equipment->equipment_name=$request->equipment_name;
        $equipment->issue=$request->issue;
        $equipment->return=$request->return;
        $equipment->dal_value=$request->dal_value;
        $equipment->value=$request->value;
        $equipment->remark=$request->remark;
        // dd($equipment);

        $equipment->save();
        return redirect()->back()->with('success', 'Record has been created successfully!');

    }

    public function show()
    {
        $equipment=Equipment::all();

        return view('employee.equipment.list',compact('equipment'));
    }


    public function destroy($id)
{
    DB::table('equipment')->where('id', $id)->delete();
        return redirect()->back()->with('success','Record deleted successfully!');

}

    public function Inactive($id)
    {
    $data=Equipment::find($id);
    $data->status='In-active';
    $data->save();
    return redirect()->back();

}

    public function active($id)
{
    $data=Equipment::find($id);
    $data->status='Active';
    $data->save();
    return redirect()->back();

}
}
