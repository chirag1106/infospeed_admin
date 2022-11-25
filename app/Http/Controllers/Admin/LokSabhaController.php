<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LokSabha;
use App\Models\VidhanSabha;
use App\Models\Block;
use App\Models\Panchayat;
use App\Models\Village;
use App\Models\Booth;

class LokSabhaController extends Controller
{
    public function view_ls(){
        $data=LokSabha::paginate(5);
        return view('Admin.lokSabha.lokSabha',['loksabha'=> $data]);
    }
    public function loksabha(Request $request){
        $request->validate([
         'ls_name'=> 'required',
        ]);
        $data=LokSabha::create([
            'ls_name'=> $request->ls_name
        ]);
        return redirect()->back();
    }
    public function ls_active($id){
        $data=LokSabha::find($id);
        $data->status=1;
        $data->save();
        return redirect()->back();
    }
    public function ls_deactive($id){
        $data=LokSabha::find($id);
        $data->status=2;
        $data->save();
        return redirect()->back();
    }
    public function edit(Request $request, $id){ 
        $this->validate($request,[
       'ls_name'=>'required',
        ]);
        $data=LokSabha::find($id);
        $data->ls_name=$request->ls_name;
        $data->save();
        return redirect()->back();
        }
        public function loksabha_delete($id){
            $data=LokSabha::where("id",$id)->delete();
            $data=VidhanSabha::where("loksabha_id",$id)->delete();
            $data=Block::where("loksabha_id",$id)->delete();
            $data=Panchayat::where("loksabha_id",$id)->delete();
            $data=Village::where("loksabha_id",$id)->delete();
            $data=Booth::where("loksabha_id",$id)->delete();
            return redirect()->back();
        }
}
