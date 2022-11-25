<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adminuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_view(){
      $session= request()->session()->has('admin-auth');
        return view('Admin.admin-auth.login');
    }
    public function login(Request $request){  
      $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
  $data=Adminuser::where('email', $request->email)->first();
  //dd($data);
  if($data){
    if(Hash::check($request->password, $data->password)){
      $request->session()->put('admin-auth', $data);
      return redirect('dashboard')->withSuccess('succesfully logged in');
  }
}
 return redirect('login')->with(['error'=>'Oppes! You have entered invalid credentials']);
 
  }


    public function logout(){
      request()->session()->forget('admin-auth');
      return redirect('login');
    }
}
