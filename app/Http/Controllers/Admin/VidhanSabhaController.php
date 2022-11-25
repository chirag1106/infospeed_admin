<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VidhanSabha;
use App\Models\LokSabha;
use App\Models\Block;
use App\Models\Panchayat;
use App\Models\Village;
use App\Models\Booth;

class VidhanSabhaController extends Controller
{
  public function view_vs(){
    $loksabha=LokSabha::where("status",1)->get();
     $data=VidhanSabha::with('get_loksabha')->paginate(5);  
      return view('Admin.vidhanSabha.vidhanSabha',['vidhansabha'=> $data, 'data'=> $loksabha]);
  }
  public function vidhansabha(Request $request){
    $request->validate([
    'ls_name'=> 'required',
    'vs_name'=> 'required',
    ]);
    $data=VidhanSabha::create([
        'loksabha_id'=> $request->ls_name,
        'vs_name'=> $request->vs_name
    ]);
    return redirect()->back();
}
public function vs_deactive($id){
  $data=VidhanSabha::find($id);
  $data->vidhan_status=2;
  $data->save();
  return redirect()->back();
 }
 public function vs_active($id){
  $data=VidhanSabha::find($id);
  $data->vidhan_status=1;
  $data->save();
  return redirect()->back();
 }


 public function get_vidhan($type, $id){
  if($type == 'lok'){
    $data = VidhanSabha::where("loksabha_id", $id)->where("vidhan_status",1)->get();
  }
  elseif($type == 'vidhan'){
    $data = Block::where("vidhansabha_id", $id)->where("block_status",1)->get();
  }
  elseif($type == 'block'){
    $data = Panchayat::where("block_id", $id)->where("panchayat_status",1)->get();
  } 
  elseif($type == 'mahanagar-panchayat'){
    $data = Panchayat::where("id", $id)->first();
  }
  elseif($type == 'village'){
    $data = Village::where("village_choosing",$id)->where("village_status",1)->get();
  
  }
  else{
    $data = VidhanSabha::where("loksabha_id", $id)->get();
  }

  $ja = json_encode($data);
  return $ja;
}
public function edit_vidhansabha(Request $request,$id){
  $validated = $request->validate([
    'vs_name' => 'required',
]);
  $data=VidhanSabha::find($id);
  $data->vs_name=$request->vs_name;
  $data->save();
  return redirect()->back();
} 

public function destroy_vidhan($id){
  $data=VidhanSabha::where("id",$id)->delete();
  $data=Block::where("vidhansabha_id",$id)->delete();
  $data=Panchayat::where("vidhansabha_id",$id)->delete();
  $data=Village::where("vidhansabha_id",$id)->delete();
  $data=Booth::where("vidhansabha_id",$id)->delete();
  return redirect()->back();
    
    
}
public function view_lok_vidhan($id){
  $find=LokSabha::find($id);
  $data=VidhanSabha::where("loksabha_id",$id)->paginate(5);
 
  return view('Admin.lokSabha.lok-vidhan',['vidhan'=>$data,'loksabha'=>$find]);
}
public function save_lokvidhan(Request $request){
    $request->validate([
    'vs_name'=> 'required',
    ]);
    $data=VidhanSabha::create([
        'loksabha_id' =>$request->loksabha_id,
        'vs_name'=> $request->vs_name
    ]);
    return redirect()->back();
}

}
