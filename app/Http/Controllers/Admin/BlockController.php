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

class BlockController extends Controller
{
    public function view_block(){
        $loksabha=LokSabha::where("status",1)->get();
        $vidhan=VidhanSabha::where("vidhan_status",1)->get();
        $data=Block::with('get_loksabha', 'get_vidhansabha')->paginate(5);
        //dd($data->toArray());
        return view('Admin.block.block',['block'=>$data, 'item'=> $vidhan, 'data'=> $loksabha]);
    }
    public function block(Request $request){
        $validated = $request->validate([
            'ls_name' => 'required',
            'vs_name' => 'required',
            'block_name' => 'required',
        ]);
        $data=Block::create([
            'loksabha_id'=> $request->ls_name,
            'vidhansabha_id'=> $request->vs_name,
             'block_name'=> $request->block_name
        ]);
        return redirect()->back();
    }
    public function block_deactive($id){
        $data=Block::find($id);
        $data->block_status=2;
        $data->save();
        return redirect()->back();
       }
       public function block_active($id){
        $data=Block::find($id);
        $data->block_status=1;
        $data->save();
        return redirect()->back();
       }
       public function edit_block(Request $request, $id){
        $validated = $request->validate([
            'block_name' => 'required',
        ]);
           $data=Block::find($id);
            $data->block_name=$request->block_name;
            $data->save();
           return redirect()->back();
       }
       public function destroy($id){
        $data=Block::where("id",$id)->delete();
        $data=Panchayat::where("block_id",$id)->delete();
        $data=Village::where("block_id",$id)->delete();
        $data=Booth::where("block_id",$id)->delete();
        return redirect()->back();
    }
    public function view_vidhan_block($id){
        $find=VidhanSabha::find($id);
        $data=Block::where("vidhansabha_id",$id)->paginate(5);
        return view('Admin.vidhanSabha.vidhan-block',['block'=>$data, "vidhansabha"=>$find]);
    }
    public function save_vidhanblock(Request $request){
        // dd($request->all());
        $request->validate([
            'block_name'=> 'required',
            ]);
            $data=Block::create([
                'loksabha_id' =>$request->loksabha_id,
                'vidhansabha_id' =>$request->vidhansabha_id,
                'block_name'=> $request->block_name
            ]);
            return redirect()->back();
    }
   
}
