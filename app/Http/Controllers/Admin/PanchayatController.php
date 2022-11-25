<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\VidhanSabha;
use App\Models\LokSabha;
use App\Models\Panchayat;
use App\Models\Booth;
use App\Models\Village;

class PanchayatController extends Controller
{
    public function view_panchayat(){
        $loksabha=LokSabha::where("status",1)->get();
        $vidhan=VidhanSabha::where("vidhan_status",1)->get();
         $block=Block::where("block_status",1)->get();
         $data=Panchayat::with('get_loksabha', 'get_vidhansabha','get_block')->paginate(5);
         //dd($data);
        return view('Admin.panchayat.panchayat',['item'=> $vidhan, 'data'=> $loksabha, 'panchayat'=>$data]);
    }
    public function panchayat(Request $request){
        $validated = $request->validate([
            'ls_name' =>'required',
            'vs_name' => 'required',
            'block_name' => 'required',
            'nagar_gram' => 'required',
            'panchayat_name' => 'required',
        ]);
        $data=Panchayat::create([
            'loksabha_id'=> $request->ls_name,
            'vidhansabha_id'=> $request->vs_name,
             'block_id'=> $request->block_name,
             'panchayat_choosing'=>$request->nagar_gram,
             'panchayat_name'=>$request->panchayat_name
        ]);
        return redirect()->back();
    }
    public function panchayat_active($id){
        $data=Panchayat::find($id);
        $data->panchayat_status=1;
        $data->save();
        return redirect()->back();
    }
    public function panchayat_deactive($id){
        $data=Panchayat::find($id);
        $data->panchayat_status=2;
        $data->save();
        return redirect()->back();
    }
    public function edit_panchayat(Request $request, $id){
        $validated = $request->validate([
            'panchayat_name' => 'required',
        ]);
   $data=Panchayat::find($id);
   $data->panchayat_name=$request->panchayat_name;
   $data->save();
   return redirect()->back();
    }
    public function delete_panchayat($id){
        $data=Panchayat::where("id",$id)->delete();
        $data=Village::where("panchayat_id",$id)->delete();
        $data=Booth::where("panchayat_id",$id)->delete();
        return redirect()->back();

    }
    public function view_block_panchayat($id){
        $find=Block::find($id);
        $data=Panchayat::where("block_id",$id)->paginate(5);
        return view('Admin.block.block-panchayat',['panchayat'=>$data, "block"=>$find]);
    }
    public function save_block_panchayat(Request $request){
        
        $request->validate([
            'nagar_gram'=> 'required',
            'panchayat_name'=> 'required',
            ]);
            $data=Panchayat::create([
                'loksabha_id' =>$request->loksabha_id,
                'vidhansabha_id' =>$request->vidhansabha_id,
                'block_id'=> $request->block_id,
                'panchayat_choosing'=>$request->nagar_gram,
                'panchayat_name'=>$request->panchayat_name
            ]);
            return redirect()->back();
    }
}
