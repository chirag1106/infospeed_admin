<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\VidhanSabha;
use App\Models\LokSabha;
use App\Models\Panchayat;
use App\Models\Village;
use App\Models\Booth;

class VillageController extends Controller
{
    public function view_village(){
        $loksabha=LokSabha::where("status",1)->get();
        $vidhan=VidhanSabha::where("vidhan_status",1)->get();
        $block=Block::where("block_status",1)->get();
        $panchayat=Panchayat::get();
        $data=Village::with('get_loksabha', 'get_vidhansabha', 'get_block', 'get_panchayat')->paginate(5);
        return view('Admin.village.village',[ 'data'=> $loksabha, 'village'=>$data, 'item'=> $vidhan]);
    }
    public function village(Request $request){
        $validated = $request->validate([
            'village_name' => 'required',
        ]);
        $data=Village::create([
        'loksabha_id'=>$request->ls_name,
        'vidhansabha_id'=>$request->vs_name,
        'block_id'=>$request->block_name,
        'panchayat_id'=>$request->panchayat_name,
        'village_choosing'=>$request->ward_village,
        'village_name'=>$request->village_name
        ]);
        return redirect()->back();
    }

    public function edit_village(Request $request, $id){
        $validated = $request->validate([
            'village_name' => 'required',
        ]);
        $data=Village::find($id);
        $data->village_name=$request->village_name;
        $data->save();
        return redirect()->back();
    }
    public function active_village($id){
        $data=Village::find($id);
        $data->village_status=1;
        $data->save();
        return redirect()->back();
    }
    public function deactive_village($id){
        $data=Village::find($id);
        $data->village_status=2;
        $data->save();
        return redirect()->back();
    }

    public function delete_village($id){
        $data=Village::where("id",$id)->delete();
        $adta=Booth::where("village_id",$id)->delete();
        return redirect()->back();
    }
    public function view_panchayat_village($id){
        $find=Panchayat::find($id);
        $data = [];
        $data['id'] = $find->panchayat_choosing;
        if($find->panchayat_choosing==1){
            $data['name'] ='ward';
        }
       else{
        $data['name'] = "village";
       } 
       $get_ward = Village::where("panchayat_id",$id)->paginate(5);
       //dd($get_ward->toArray());
        return view('Admin.panchayat.panchayat-village',['panchayat'=>$find, 'village'=>$data, 'wards'=>$get_ward]);
    }
    public function save_panchayat_village(Request $request){
        $validated = $request->validate([
            'village_name' => 'required',
        ]);
        $data=Village::create([
        'loksabha_id'=>$request->loksabha_id,
        'vidhansabha_id'=>$request->vidhansabha_id,
        'block_id'=>$request->block_id,
        'panchayat_id'=>$request->panchayat_id,
        'village_choosing'=>$request->ward_village,
        'village_name'=>$request->village_name
        ]);
        return redirect()->back();
    }
}
