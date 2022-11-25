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

class BoothController extends Controller
{
    public function view_booth(){
        $loksabha=LokSabha::where("status",1)->get();
        $vidhan=VidhanSabha::where("vidhan_status",1)->get();
        $data=Booth::with('get_loksabha', 'get_vidhansabha','get_block','get_panchayat','get_village')->paginate(5);
        //dd($data->toArray());
        return view('Admin.booth.booth',['data'=> $loksabha, 'item'=> $vidhan, 'booth'=> $data]);
    }
    public function booth(Request $request){
        $validated = $request->validate([
            'ls_name' =>'required',
            'vs_name' => 'required',
            'block_name' => 'required',
            'panchayat_name' => 'required',
            'ward_village'=> 'required',
            'village_name' => 'required',
            'booth_name'=> 'required',
         ]);
        $data=Booth::create([
          'loksabha_id'=>$request->ls_name,
          'vidhansabha_id'=>$request->vs_name,
          'block_id'=>$request->block_name,
        'panchayat_id'=>$request->panchayat_name,
        'village_choosing'=>$request->ward_village,
        'village_id'=>$request->village_name,
        'booth_name'=>$request->booth_name
        ]);
        return redirect()->back();
    }
    public function booth_active($id){
        $data=Booth::find($id);
        $data->booth_status=1;
        $data->save();
        return redirect()->back();
       }
       public function booth_deactive($id){
        $data=Booth::find($id);  
        $data->booth_status=2;
        $data->save();
        return redirect()->back();
       }
       public function booth_edit(Request $request, $id){
        $validated = $request->validate([
            'booth_name' => 'required',
        ]);
           $data=Booth::find($id);
           $data->booth_name=$request->booth_name;
           $data->save();
           return redirect()->back();

       }
       public function booth_delete($id){
           $data=Booth::find($id);
           $data->delete();
           return redirect()->back();
       }
       public function view_village_booth($id){
           $find=Village::find($id);
           $data=Booth::where("village_id",$id)->paginate(5);
           return view('Admin.village.village-booth',['village'=>$find, 'booth'=>$data]);
       }
       public function save_village_booth(Request $request){
           //dd($request->all());
        $validated = $request->validate([
            'booth_name' => 'required',
        ]);
        $data=Booth::create([
        'loksabha_id'=>$request->loksabha_id,
        'vidhansabha_id'=>$request->vidhansabha_id,
        'block_id'=>$request->block_id,
        'panchayat_id'=>$request->panchayat_id,
        'village_choosing'=>$request->ward_village,
        'village_id'=>$request->village_id,
        'booth_name'=>$request->booth_name
        ]);
        return redirect()->back();
    }
}
