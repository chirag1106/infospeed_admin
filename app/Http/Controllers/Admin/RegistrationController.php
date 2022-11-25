<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adminuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function signup(){
        $session= request()->session()->has('admin-auth');
        return view('Admin.admin-auth.registration');
    }
    public function register(Request $request){
        //dd($request->toall());
        $request->validate([
            'email' => 'required',
            'name'=> 'required',
            'number'=> 'required|numeric',
            'password' => 'required',
        ]);
        Adminuser::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'number'=>$request->number,
            'password'=>Hash::make($request->password)
   
              ]);
              return redirect('dashboard');
    }
}
