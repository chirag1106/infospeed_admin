<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use Illuminate\Support\Facades\Hash;
use Mail;

class EmployeController extends Controller
{
    public function view(){
        $session= request()->session()->get('admin-auth');
        $data=Employe::paginate(5);
        return view('Admin.employe.add_employe',['Employe'=>$data]);
    }
    public function employe(Request $request){
        $request->validate([
            'emp_type' => 'required',
            'emp_name'=> 'required',
            'emp_phone'=> 'required|numeric',
            'emp_email' => 'required|email',
            'emp_address' => 'required',
            'emp_wages' => 'required',
            'emp_date' => 'required',
        ]);
        $name=$request->emp_name;
        $fname= explode(' ', $name )[0] ;
        $converted1 = ucfirst($fname);
        $pswrd= $converted1.'@'.$request->emp_phone;
        //dd($pswrd); 
        //dd($converted1);
        
        $data=Employe::create([
            'emp_type'=> $request->emp_type,
            'emp_name'=> $request->emp_name,
            'emp_email'=> $request->emp_email,
            'emp_password'=> Hash::make($pswrd),
            'emp_phone'=> $request->emp_phone,
            'emp_address'=>$request->emp_address,
            'emp_wages'=> $request->emp_wages,
            'emp_date'=> $request->emp_date 
        ]);
        try {

            $data=['password'=>$pswrd];
            $user['to']= $request->emp_email;
            Mail::send('Admin.mail.mail',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('hello user');
            });
          
          } catch (\Exception $e) {
              return redirect()->back()->with(['error'=>"Invailed Email Address"]);
          }
        return redirect()->back()->with(['status'=> "Data is saved in the table"]);
    }


    public function emp_edit(Request $request,$id){
        $this->validate($request,[
            'emp_name'=>'required',
            'emp_email'=>'required|email',
            'emp_phone'=>'required|numeric',
            'emp_wages'=>'required',
            'emp_address'=>'required',
            'emp_date'=>'required',

        ]);
        $data=Employe::find($id);
        $data->emp_type=$request->emp_type;
        $data->emp_name=$request->emp_name;
        $data->emp_email=$request->emp_email;
        $data->emp_phone=$request->emp_phone;
        $data->emp_address=$request->emp_address;
        $data->emp_wages=$request->emp_wages;
        $data->emp_date=$request->emp_date;
        $data->save();
        return redirect()->back();
    }

    public function delete($id){
        $data=Employe::find($id);
        $data->delete();
        return redirect()->back();
    }
}
