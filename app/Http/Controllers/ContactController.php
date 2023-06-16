<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Career;
use App\Models\Applyjob;
use DB;

class ContactController extends Controller
{
  
    public function contact() {
        $contacts = DB::table('contact_us')->select('*')->orderBy('id', 'desc')->get();
          return view('contacts.contact', compact('contacts'));
    }
  	public function career() {
        $career = DB::table('career')->select('*')->orderBy('id', 'desc')->get();
          return view('contacts.career', compact('career'));
    }

    public function store(Request $request){

           $user = new Contact;
           $user->f_name = $request->last_name;
           $user->email = $request->email;
      	   $user->phone1 = $request->phone;
           $user->message = $request->message;
            $save = $user->save();
           if($save){
                return response()->json(['message' => 'Message sent successfully'], 200);
           }else{
                return response()->json(['message' => 'Message not sent'], 200);
           }

    }
  public function careerstore(Request $request){

           $user = new Career;
           $user->full_name = $request->full_name;
           $user->country = $request->country;
      	   $user->city = $request->city;
           $user->position = $request->position;
    	   $user->experience = $request->experience;
    
          if ($request->file('image') != null) {
              $imageName = time().'.'.$request->image->extension();
              $result = $request->image->move(public_path('/assets/images/blogs/'), $imageName);
              $user->file ="https://app.tenetsys.com/public/assets/images/blogs/".$imageName;
          }
          $save = $user->save();
          if($save){
                return response()->json(['message' => 'Application sent successfully'], 200);
          }
    	  else{
                return response()->json(['message' => 'Application not sent'], 200);
           }

    }
}
