<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;

class DashboardController extends Controller
{
   public function dashboard(){
    $session= request()->session()->get('admin-auth');
    //dd($session);
    $count= Employe::count();
   return view('Admin.dashboard',['emp_count'=> $count]);
   }
}
