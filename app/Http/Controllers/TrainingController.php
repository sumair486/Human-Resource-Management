<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function index()
    {
        $training=Training::all();
        return view('employee.training.index',compact('training'));
    }

    public function store(Request $request)
    {
        $training=new Training();
        $training->date=$request->date;
        $training->document=$request->document;
        $training->description=$request->description;
        $training->remark=$request->remark;
        // dd($training);

        $training->save();
        return redirect()->back()->with('success', 'Record has been created successfully!');

    }


    public function destroy($id)
{
    DB::table('trainings')->where('id', $id)->delete();
        return redirect()->back()->with('success','Record deleted successfully!');

}

    public function Inactive($id)
    {
    $data=Training::find($id);
    $data->status='In-active';
    $data->save();
    return redirect()->back();

}

    public function active($id)
{
    $data=Training::find($id);
    $data->status='Active';
    $data->save();
    return redirect()->back();

}
}
