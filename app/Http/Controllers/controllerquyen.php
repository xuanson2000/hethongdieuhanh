<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quyen;
use App\quantri;
use App\vaitro;
use App\vaitro_quyen;
use DB;
class controllerquyen extends Controller
{
    //
	public function index(){
		$vaitros=DB::table('vaitro')->get();

	    $quyens=DB::table('quyen')->get();
		return view('phanquyen.quyen.index',['vaitros'=>$vaitros,'quyens'=>$quyens]);
		unset($vaitros);
		unset($quyens);
	}


	public function themvaitro(Request $req){

		$vaitro = new vaitro;
		$vaitro->name= $req ->name;
    	$vaitro->save();

    	$pe = $req->quyen;

   		foreach ($pe as $p) {
   			\DB::table('vaitro_quyen')->insert([
   				'vt_id'=> $vaitro->id,
   				'quyen_id' => $p
   			]); 
   		} 

    


    	return redirect('wp-admin/vai-tro-quan-tri.html')->with('messgthem','Thêm thành công');
    	


	}


   public function xoavaitro($id){

    	  $xoavaitro = vaitro::find($id);
               $xoavaitro->delete();
               
          $xoaquyens= vaitro_quyen::where('vt_id',$id)->get();
          foreach ($xoaquyens as $xoaquyen) {
             	 $xoaquyen ->delete();
             }   
                  
           	return redirect('wp-admin/vai-tro-quan-tri.html')->with('messgxoa','Xóa thành công');
    }


}
