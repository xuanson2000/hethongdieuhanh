<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhiemvu_donvithuchien;
use Auth;
use DB;
use Excel;
use App\nghiemthucapcoso;
use App\nghiemthucoso_chuyengia;
use App\phuluckhoiluongtt;
class ControllerNhiemvutrungtam extends Controller
{
    //

    public function trangchutrungtam(){

    return view('quantri.trangchu.indextt');
    }

    

    public function nhiemvutt(){

     $id_use=Auth::guard('quantri')->user()->id;
      $quantri=DB::table('quantri')->find($id_use);
    

        $nhiemvu_donvithuchiens=nhiemvu_donvithuchien::where('id_donvi',$quantri->phongBan)->get();

        return view('nhiemvuchuyenmontt.index',['nhiemvu_donvithuchiens'=>$nhiemvu_donvithuchiens]);

    }

    

    public function chitietnhiemvutt($id){
       $id_use=Auth::guard('quantri')->user()->id;
       $quantri=DB::table('quantri')->find($id_use);

       $nhiemvu_donvithuchien=nhiemvu_donvithuchien::find($id);

       return view('nhiemvuchuyenmontt.chitietnhiemvutt',['nhiemvu_donvithuchien'=>$nhiemvu_donvithuchien]);

   }

   
   public function importphuluctt($id, Request $request){

       $this->validate($request,[
          'select_file'  => 'required|mimes:xls,xlsx'
      ]);

       $path = $request->file('select_file')->getRealPath();

       $data = Excel::load($path)->get();
  // dd($data );

       if($data->count() > 0)
       {


        foreach($data->toArray() as $key => $value)

        {
            $insert_data[] = array(
                'stt'   => $value['stt'],
                'noidung'   => $value['noi_dung'],
                'dvt'   => $value['don_vi_tinh'],
                'khoiluong'   => $value['khoi_luong'],
                'dutoanpheduyet'   => $value['du_toan_duoc_phe_duyet'],
                'id_nhiemvu_donvi'=>$id

            );

        }
    }

    if(!empty($insert_data))
    {

       DB::table('phuluckhoiluongtt')->insert($insert_data);


   }

   return back()->with('successfile', 'Thêm khối lượng thành công');

}



    public function nhiemvuchuyenmonttnghiemthu(){

     $id_use=Auth::guard('quantri')->user()->id;
      $quantri=DB::table('quantri')->find($id_use);
    

      $nhiemvu_donvithuchiens=nhiemvu_donvithuchien::where('id_donvi',$quantri->phongBan)->get();

        return view('nhiemvuchuyenmontt.nhiemvuchuyenmonttnghiemthu',['nhiemvu_donvithuchiens'=>$nhiemvu_donvithuchiens]);

    }



    public function chitietnghiemthutt($id){
       $id_use=Auth::guard('quantri')->user()->id;
       $quantri=DB::table('quantri')->find($id_use);

       $nhiemvu_donvithuchien=nhiemvu_donvithuchien::find($id);

       return view('nhiemvuchuyenmontt.chitietnghiemthutt',['nhiemvu_donvithuchien'=>$nhiemvu_donvithuchien]);

   }



   public function nhapquyetdinhnghiemthucoso($id, Request $req){

    $nghiemthucapcosoid=nghiemthucapcoso::where('id_nhiemvu_donvi',$id)->where('loainghiemthu',$req->loainghiemthu)->get();
    if(count($nghiemthucapcosoid)>0){

       echo"<script type='text/javascript'>
       alert('Thông báo: Hội đồng nghiệm thu đã được thành lập!');
       window.location='";
       echo route('chitietnghiemthutt',[$id]);
       echo"'</script>";

   }else{

    $nghiemthucapcoso= new nghiemthucapcoso;
    $nghiemthucapcoso->soqd=$req->soqd;
    $nghiemthucapcoso->ngayqd=$req->ngayqd;
    $nghiemthucapcoso->noidung=$req->noidung;
    $nghiemthucapcoso->id_nhiemvu_donvi=$id;
    $nghiemthucapcoso->loainghiemthu=$req->loainghiemthu;

    $nghiemthucapcoso->cancuphaply=$req->cancuphaply;
    $nghiemthucapcoso->thanhphannt=$req->thanhphannt;
    $nghiemthucapcoso->bophanthuchien=$req->bophanthuchien;
     if($req->hasFile('file')){
        $file =$req->file('file');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;
        while(file_exists("public/tailieu/".$Hinh))
        {
            $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);
        $nghiemthucapcoso->file=$Hinh;
    }
    $nghiemthucapcoso->save();

    $id_quantris=$req->id_quantri;
    foreach($id_quantris as $id_quantr){
      $nghiemthucoso_chuyengia= new nghiemthucoso_chuyengia;
      $nghiemthucoso_chuyengia->id_nvcs=$nghiemthucapcoso->id;
      $nghiemthucoso_chuyengia->id_quantri=$id_quantr;
      $nghiemthucoso_chuyengia->trangthai=0;
      $nghiemthucoso_chuyengia->save();

  }



  return redirect('quan-tri/chi-tiet-nghiem-thu-nhiem-vu-tt-co-so/'.$id)->with('messgthem','Thêm thành công');

    }
}



public function xoanghiemthucs($id){

    $nghiemthucapcosoid=nghiemthucapcoso::find($id);
    $checkntcs=$nghiemthucapcosoid->ngaykt;
    
    $nghiemthucoso_chuyengias=nghiemthucoso_chuyengia::where('id_nvcs',$id)->get();
    $checkchuyengia=0;
    foreach($nghiemthucoso_chuyengias as $nghiemthucoso_chuyengia){
        if( $nghiemthucoso_chuyengia->trangthai==1)
        {
           $checkchuyengia=$checkchuyengia+1;
       }

   }


   if( $checkntcs!=null ||  $checkchuyengia>0 ){

     echo"<script type='text/javascript'>
     alert('Thông báo: Không thể xóa được quyết định hội đồng nghiệm thu này, vì hội đồng nghiệm thu đã hoạt động!');
     window.location='";
     echo route('chitietnghiemthutt',[$nghiemthucapcosoid->id_nhiemvu_donvi]);
     echo"'</script>";

 }else{
  $nghiemthucapcosoid->delete();
  foreach($nghiemthucoso_chuyengias as $nghiemthucoso_chuyengia){
    $nghiemthucoso_chuyengia->delete();
}

return redirect('quan-tri/chi-tiet-nghiem-thu-nhiem-vu-tt-co-so/'.$nghiemthucapcosoid->id_nhiemvu_donvi)->with('messgthem','Xóa thành công');


}



}








   public function denghinghiemthuquanly($id, Request $req){

    $nhiemvu_donvithuchienid=nhiemvu_donvithuchien::find($id);

    if($req->loainghiemthu==6){
       if($req->hasFile('file_bcthth')){
        $file =$req->file('file_bcthth');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;
        while(file_exists("public/tailieu/".$Hinh))
        {
            $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);
        $nhiemvu_donvithuchienid->file_bcthth=$Hinh;
    }
    if($req->hasFile('file_denghinghiemthu')){
        $file =$req->file('file_denghinghiemthu');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;
        while(file_exists("public/tailieu/".$Hinh))
        {
            $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);
        $nhiemvu_donvithuchienid->file_denghinghiemthu=$Hinh;
    }

    if($req->hasFile('file_kehoachnghiemthu')){
        $file =$req->file('file_kehoachnghiemthu');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;
        while(file_exists("public/tailieu/".$Hinh))
        {
            $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);
        $nhiemvu_donvithuchienid->file_kehoachnghiemthu=$Hinh;
    }

    if($req->hasFile('file_ntccs')){
        $file =$req->file('file_ntccs');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;
        while(file_exists("public/tailieu/".$Hinh))
        {
            $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);
        $nhiemvu_donvithuchienid->file_ntccs=$Hinh;
    }
    $nhiemvu_donvithuchienid->save();

    }else{

      if($req->hasFile('file_bcthth')){
        $file =$req->file('file_bcthth');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;
        while(file_exists("public/tailieu/".$Hinh))
        {
            $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);
        $nhiemvu_donvithuchienid->file_bcthth12=$Hinh;
    }
    if($req->hasFile('file_denghinghiemthu')){
        $file =$req->file('file_denghinghiemthu');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;
        while(file_exists("public/tailieu/".$Hinh))
        {
            $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);
        $nhiemvu_donvithuchienid->file_denghinghiemthu12=$Hinh;
    }

    if($req->hasFile('file_kehoachnghiemthu')){
        $file =$req->file('file_kehoachnghiemthu');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;
        while(file_exists("public/tailieu/".$Hinh))
        {
            $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);
        $nhiemvu_donvithuchienid->file_kehoachnghiemthu12=$Hinh;
    }

    if($req->hasFile('file_ntccs')){
        $file =$req->file('file_ntccs');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;
        while(file_exists("public/tailieu/".$Hinh))
        {
            $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);
        $nhiemvu_donvithuchienid->file_ntccs12=$Hinh;
    }
    $nhiemvu_donvithuchienid->save();


    }

   
  return redirect('quan-tri/chi-tiet-nghiem-thu-nhiem-vu-tt-co-so/'.$id)->with('messgthem','Thêm thành công');

}



    public function giaohmcvnt($id_chuyengia,$id_ntcs){

        $nghiemthucapcosoid=nghiemthucapcoso::find($id_ntcs);
        $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$nghiemthucapcosoid->id_nhiemvu_donvi)->orderBy('id','ASC')->get();

       return view('nhiemvuchuyenmontt.giaohmcvnt',['phuluckhoiluongtts'=>$phuluckhoiluongtts,'id_chuyengia'=>$id_chuyengia,'loaint'=> $nghiemthucapcosoid->loainghiemthu,'id_nhiemvu_donvi'=>$nghiemthucapcosoid->id_nhiemvu_donvi]);

   }

    public function savegiaohmcvnt($loaint,$id_chuyengia,$id_nhiemvu_donvi,Request $req){




      $mahmcvs=$req->example2;

      $i=0;
      if($loaint==6){
        DB::table('phuluckhoiluongtt')->where('id_chuyengiacs6t', $id_chuyengia)->where('id_nhiemvu_donvi', $id_nhiemvu_donvi)->update(['id_chuyengiacs6t' => null]);

        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->id_chuyengiacs6t= $id_chuyengia;
          $phuluckhoiluongtts->save();
          $i++;
      }

  }else{

      DB::table('phuluckhoiluongtt')->where('id_chuyengiacs12t', $id_chuyengia)->where('id_nhiemvu_donvi', $id_nhiemvu_donvi)->update(['id_chuyengiacs6t' => null]);

    foreach($mahmcvs as $mahmcv){
      $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
      $phuluckhoiluongtts->id_chuyengiacs12t= $id_chuyengia;
      $phuluckhoiluongtts->save();
      $i++;

  }

}

       return redirect('quan-tri/chi-tiet-nghiem-thu-nhiem-vu-tt-co-so/'.$id_nhiemvu_donvi)->with('messgthem','Giao nhiệm vụ nghiêm thu thành công');

   }


   public function dieuchinhdongiacs($id_nhiemvu_donvi,$loaint){
    $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$id_nhiemvu_donvi)->orderBy('id','ASC')->get();
    return view('nhiemvuchuyenmontt.dieuchinhdongiacs',['phuluckhoiluongtts'=>$phuluckhoiluongtts,'loaint'=>$loaint,'id_nhiemvu_donvi'=>$id_nhiemvu_donvi]);

}


public function savedieuchinhdongiacs($id_nhiemvu_donvi,$loaint,Request $req){

      
      $mahmcvs=$req->example2;
      $dongiadc[]=$req->dongiadc;
     
        $i=0;
      if($loaint==6){
        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->dongiadc6tcs=$dongiadc[0][$i];
          
          $phuluckhoiluongtts->save();
          $i++;
        }

      }else{
        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->dongiadc12tcs=$dongiadc[0][$i];
          $phuluckhoiluongtts->save();
          $i++;

        }

      }

     
  
  return redirect('quan-tri/chi-tiet-nghiem-thu-nhiem-vu-tt-co-so/'.$id_nhiemvu_donvi)->with('messgthem','Thêm thành công');
   }



}
