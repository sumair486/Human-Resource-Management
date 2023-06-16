<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayableExpance;
use App\Models\ReciveExpance;
use App\Models\ExpenceDocuments;
use App\Models\ClientInvoice;

class ExpanceController extends Controller
{
    public function AddPableExpance(){
        return view('expance.payable.create');

    }

    public function AllPableExpance(){

        $payable= PayableExpance::all();

        return view('expance.payable.list', compact('payable'));
    }


    public function PostPableExpance(Request $request){

        $payable = new PayableExpance;

        $payable->things = $request->things;
        $payable->price = $request->price;
        $payable->plane_price = $request->plan;
        $payable->paid_by = $request->paid;

        $result=$payable->save();
        if($request->file)
        {
            foreach ($request->file ? : [] as $file) {
                $filename =  time().'_'.$file->getClientOriginalName();
                $destinationPath = public_path('/storage/expence_documents');
                $filePath = $destinationPath. "/".  $filename;
                $file->move($destinationPath, $filename);
                ExpenceDocuments::create([
                    'type_id' => $payable->id,
                    'type' => "payable",
                    'file' => $filename,
                ]);
            }
        }

        if($result){

            return back()->with('success', 'Record has been saved');
            // return $filename;
        }else{

            return back()->with('error', 'Something wrong');
        }

      }

      public function EditPableExpance($id){

        $payable= PayableExpance::where('id',$id)->first();

        return view('expance.payable.edit', compact('payable'));

        // return $payable;
    }

    public function deletePayableExpance($id){

        $payable= PayableExpance::where('id',$id)->delete();

        if($payable){
            return back()->with('success', 'Record has been Deleted');

        }else{

            return back()->with('error', 'Something wrong');
        }

    }

    public function UpdatePableExpance(Request $request){

        $payable =  PayableExpance::find($request->id);

        $payable->things = $request->things;
        $payable->price = $request->price;
        $payable->plane_price = $request->plan;
        $payable->paid_by = $request->paid;

        $result=$payable->update();

        if($result){

            return back()->with('success', 'Record Update Successfully');
        }else{

            return back()->with('error', 'Something wrong');
        }

      }

    public function AddrecivableExpance(){

        return view('expance.recivable.create');

    }



    public function PostReciveableExpance(Request $request){

        $reiveable = new ReciveExpance;

        $reiveable->client_name = $request->client_name;
        $reiveable->purpose = $request->Purpose;
        $reiveable->description = $request->description;
        $reiveable->plan = $request->plan;
        $reiveable->paid_via = $request->paid_via;
        $reiveable->amount = $request->amount;


        $result=$reiveable->save();

        if($request->file)
        {
            foreach ($request->file ? : [] as $file) {
                $filename =  time().'_'.$file->getClientOriginalName();
                $destinationPath = public_path('/storage/expence_documents');
                $filePath = $destinationPath. "/".  $filename;
                $file->move($destinationPath, $filename);
                ExpenceDocuments::create([
                    'type_id' => $reiveable->id,
                    'type' => "recivedable",
                    'file' => $filename,
                ]);
            }
        }

        if($result){

            return back()->with('success', 'Record has been saved');
        }else{

            return back()->with('error', 'Something wrong');
        }

      }

      public function AllreciveableExpance(){

        $clientInvoice = ClientInvoice::where('status',"Paid")->get();

        // $clientInvoiceDetail = clientInvoiceDetail::where('client_invoice_id',$id)->get();
        
        //  $clientInvoiceDetail = ClientInvoice::find($id)->clientInvoiceDetail;

  

        return view('expance.recivable.list', compact('clientInvoice'));
        
    }
    public function EditrecivableExpance($id){

        $recivedable= ReciveExpance::where('id',$id)->first();

        return view('expance.recivable.edit', compact('recivedable'));

        // return $payable;
    }

    public function deleterecivableExpance($id){

        $payable= ReciveExpance::where('id',$id)->delete();

        if($payable){
            return back()->with('success', 'Record has been Deleted');

        }else{

            return back()->with('error', 'Something wrong');
        }

    }

    public function UpdaterecivableExpance(Request $request){

        $reiveable =  ReciveExpance::find($request->id);

        $reiveable->client_name = $request->client_name;
        $reiveable->purpose = $request->Purpose;
        $reiveable->description = $request->description;
        $reiveable->plan = $request->plan;
        $reiveable->paid_via = $request->paid_via;
        $reiveable->amount = $request->amount;

        $result=$reiveable->update();

        if($result){

            return back()->with('success', 'Record Update Successfully');
        }else{

            return back()->with('error', 'Something wrong');
        }

      }
}
