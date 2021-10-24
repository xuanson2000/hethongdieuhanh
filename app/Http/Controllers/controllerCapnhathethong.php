<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hmcv_theolinhvuc;
use App\hmcv_cap2;
use App\hmcv_cap3;
use App\hmcv_cap4;
use DB;


class controllerCapnhathethong extends Controller
{
    public function hmcvc2(){

        $hmcv_theolinhvucs=DB::table('hmcv_theolinhvuc')->get();
        $hmcv_cap2s= hmcv_cap2::paginate(20);
        // dd($hmcv_cap2s);

        return view('capnhathethong.capnhathmcvc2.index',['hmcv_cap2s'=>$hmcv_cap2s,'hmcv_theolinhvucs'=>$hmcv_theolinhvucs]);

    }


    public function xoahmcvc2($id){
        $hmcv_cap2delete=hmcv_cap2::find($id);
        // dd($hmcv_cap2delete);
        $hmcv_cap2delete->delete();       
        return redirect('quan-tri/cap-nhat-hang-muc-cv-cap-2')->with('messgxoa','Xóa thành công'); 
    }

    
    public function themhmcvc2(Request $req){
        $hmcv_cap2 = new hmcv_cap2;
        $hmcv_cap2->id_hmcv_c1=$req->id_hmcv_c1;
        $hmcv_cap2->tenhmcv=$req->tenhmcv;
        $hmcv_cap2->save();
        return redirect('quan-tri/cap-nhat-hang-muc-cv-cap-2')->with('messgthem','Thêm thành công');
    }



    public function hmcvc3(){

        $hmcv_cap2s= DB::table('hmcv_cap2')->get();
        $hmcv_cap3s=DB::table('hmcv_cap3')->paginate(20);

        return view('capnhathethong.capnhathmcvc3.index',['hmcv_cap2s'=>$hmcv_cap2s,'hmcv_cap3s'=>$hmcv_cap3s]);
    }


    public function xoahmcvc3($id){
        $hmcv_cap3delet=hmcv_cap3::find($id);
        $hmcv_cap3delet->delete();       
        return redirect('quan-tri/cap-nhat-hang-muc-cv-cap-3')->with('messgxoa','Xóa thành công'); 
    }


    public function themhmcvc3(Request $req){
        $hmcv_cap3 = new hmcv_cap3;
        $hmcv_cap3->id_hmcv_c2=$req->id_hmcv_c2;
        $hmcv_cap3->tenhmcv=$req->tenhmcv;
        $hmcv_cap3->save();
        return redirect('quan-tri/cap-nhat-hang-muc-cv-cap-3')->with('messgthem','Thêm thành công');
    }




    public function hmcvc4(){


        $hmcv_cap3s=DB::table('hmcv_cap3')->get();
        $hmcv_cap4s=DB::table('hmcv_cap4')->paginate(20);
      

        return view('capnhathethong.capnhathmcvc4.index',['hmcv_cap4s'=>$hmcv_cap4s,'hmcv_cap3s'=>$hmcv_cap3s]);
    }


  public function xoahmcvc4($id){

    $hmcv_cap4delet=hmcv_cap4::find($id);
    $hmcv_cap4delet->delete();       
    return redirect('quan-tri/cap-nhat-hang-muc-cv-cap-4')->with('messgxoa','Xóa thành công'); 
    }



    public function themhmcvc4(Request $req){
        $hmcv_cap4 = new hmcv_cap4;
        $hmcv_cap4->id_hmcv_c3=$req->id_hmcv_c3;
        $hmcv_cap4->tenhmcv=$req->tenhmcv;
        $hmcv_cap4->donvitinh=$req->donvitinh;
        $hmcv_cap4->save();
        return redirect('quan-tri/cap-nhat-hang-muc-cv-cap-4')->with('messgthem','Thêm thành công');
    }





}
