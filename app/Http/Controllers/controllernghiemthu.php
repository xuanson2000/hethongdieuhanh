<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhiemvuchuyenmon;
use Excel;
use DB;
use Auth;
use App\nhiemvu_donvithuchien;
use App\nghiemthucapquanly;
use App\nghiemthucapcoso;
use App\nghiemthucapquanly_chuyengia;
use App\nghiemthucoso_chuyengia;
use App\phuluckhoiluongtt;
use PDF;



class controllernghiemthu extends Controller
{
   
    
    public function mainnghiemthu(){

     $id_use=Auth::guard('quantri')->user()->id;
     $nghiemthucapquanly_chuyengias=nghiemthucapquanly_chuyengia::where('id_quantri',$id_use)->where('trangthai',0)->get();

     $nghiemthucoso_chuyengias=nghiemthucoso_chuyengia::where('id_quantri',$id_use)->where('trangthai',0)->get();

     $diem=count($nghiemthucapquanly_chuyengias)+count($nghiemthucoso_chuyengias);


     
     return view('hoidongnghiemthu.main',['nghiemthucapquanly_chuyengias'=>$nghiemthucapquanly_chuyengias, 'nghiemthucoso_chuyengias'=>$nghiemthucoso_chuyengias,'diem'=>$diem]);

   }

    public function nghiemthuindex(){
    $id_use=Auth::guard('quantri')->user()->id;
     $nghiemthucapquanly_chuyengias=nghiemthucapquanly_chuyengia::where('id_quantri',$id_use)->where('trangthai',0)->get();

     $nghiemthucoso_chuyengias=nghiemthucoso_chuyengia::where('id_quantri',$id_use)->where('trangthai',0)->get();

     $diem=count($nghiemthucapquanly_chuyengias)+count($nghiemthucoso_chuyengias);


     
     return view('hoidongnghiemthu.main',['nghiemthucapquanly_chuyengias'=>$nghiemthucapquanly_chuyengias, 'nghiemthucoso_chuyengias'=>$nghiemthucoso_chuyengias,'diem'=>$diem]);

    }

    public function chitiethoidongnghiemthu($id){
     
     
      $nghiemthucapquanly_chuyengia=nghiemthucapquanly_chuyengia::find($id);

     
        return view('hoidongnghiemthu.chitiethoidongnghiemthu',['nghiemthucapquanly_chuyengia'=>$nghiemthucapquanly_chuyengia]);

    }

    

    public function chitiethoidongnghiemthucs($id){
     
     
      $nghiemthucoso_chuyengia=nghiemthucoso_chuyengia::find($id);

     
        return view('hoidongnghiemthu.chitiethoidongnghiemthucs',['nghiemthucoso_chuyengia'=>$nghiemthucoso_chuyengia]);

    }

    public function guibienbannghiemthu($id, Request $req){

      $nghiemthucapquanly_chuyengia=nghiemthucapquanly_chuyengia::find($id);

      if($req->hasFile('bienban')){

        $file =$req->file('bienban');

        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;


        while(file_exists("public/tailieu/".$Hinh))
        {

          $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);

        $nghiemthucapquanly_chuyengia->bienban=$Hinh;

      }
        $nghiemthucapquanly_chuyengia->trangthai=1;
       $nghiemthucapquanly_chuyengia->save();
       // return back()->with('successfile', 'Gửi biên bản thành công');
       return redirect('quan-tri/hoi-dong-nghiem-thu')->with('successfile','Gửi biên bản thành công'); 
    }


      

    public function taoformbienbancs($id,$loaint,$id_ntcs){

      if($loaint==6){
        $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$id)->where('id_chuyengiacs6t',[Auth::guard('quantri')->user()->id])->orderBy('id','ASC')->get();

      }else{

       $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$id)->where('id_chuyengiacs12t',[Auth::guard('quantri')->user()->id])->orderBy('id','ASC')->get();
      }



  
  
      return view('hoidongnghiemthu.taoformbienbancs',['phuluckhoiluongtts'=>$phuluckhoiluongtts,'id_ntcs'=>$id_ntcs,'loaint'=>$loaint]);

    }

    




    public function saveformbienban($id_ntcs,$loaint,Request $req){


      $id_use=Auth::guard('quantri')->user()->id;
      $mahmcvs=$req->example2;
      $ntcs[]=$req->ntcs;
      $thcs[]=$req->thcs;


        $i=0;
      if($loaint==6){
        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->ntcs6t=$ntcs[0][$i];
          $phuluckhoiluongtts->thcs6t=$thcs[0][$i];
          $phuluckhoiluongtts->id_chuyengiacs6t= $id_use;
          $phuluckhoiluongtts->save();
          $i++;
        }




      }else{
        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->ntcs12t=$ntcs[0][$i];
           $phuluckhoiluongtts->thcs12t=$thcs[0][$i];
            $phuluckhoiluongtts->id_chuyengiacs12t= $id_use;
          $phuluckhoiluongtts->save();
          $i++;

        }

      }

      $nghiemthucoso_chuyengiaadd=nghiemthucoso_chuyengia::where('id_nvcs',$id_ntcs)->where('id_quantri',$id_use)->first();
     

     $nghiemthucoso_chuyengiaadd->trangthai=1;
      $nghiemthucoso_chuyengiaadd->ngabt=$req->ngabt;
      $nghiemthucoso_chuyengiaadd->ngaykt=$req->ngaykt;


      $nghiemthucoso_chuyengiaadd->danhgiakhoiluong=$req->danhgiakhoiluong;
      $nghiemthucoso_chuyengiaadd->danhgiachatluong=$req->danhgiachatluong;
      $nghiemthucoso_chuyengiaadd->ketluan=$req->ketluan;
      $nghiemthucoso_chuyengiaadd->kiennghi=$req->kiennghi;

      $nghiemthucoso_chuyengiaadd->save();

     return redirect('quan-tri/thong-bao-gui-bien-ban-nghiem-thu');

   }




    public function taoformbienban($id,$loaint, $id_ntql){


      if($loaint==6){
        $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$id)->where('id_chuyengiaql6t',[Auth::guard('quantri')->user()->id])->orderBy('id','ASC')->get();

      }else{

        $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$id)->where('id_chuyengiaql12t',[Auth::guard('quantri')->user()->id])->orderBy('id','ASC')->get();
      }



      return view('hoidongnghiemthu.taoformbienban',['phuluckhoiluongtts'=>$phuluckhoiluongtts,'id_ntql'=>$id_ntql,'loaint'=>$loaint]);

    }


   public function saveformbienbanql($id_ntql,$loaint,Request $req){
    
     $id_use=Auth::guard('quantri')->user()->id;
     $mahmcvs=$req->example2;
     $ntql[]=$req->ntql;
     $thql[]=$req->thql;


        $i=0;
      if($loaint==6){
        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->ntql6t=$ntql[0][$i];
          $phuluckhoiluongtts->thql6t=$thql[0][$i];
          $phuluckhoiluongtts->id_chuyengiaql6t= $id_use;
          $phuluckhoiluongtts->save();
          $i++;
        }




      }else{
        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->ntql12t=$ntql[0][$i];
           $phuluckhoiluongtts->thql12t=$thql[0][$i];
            $phuluckhoiluongtts->id_chuyengiaql12t= $id_use;
          $phuluckhoiluongtts->save();
          $i++;

        }

      }

      $nghiemthuquanly_chuyengiaadd=nghiemthucapquanly_chuyengia::where('id_ntql',$id_ntql)->where('id_quantri',$id_use)->first();
        $nghiemthuquanly_chuyengiaadd->trangthai=1;
      $nghiemthuquanly_chuyengiaadd->ngabt=$req->ngabt;
      $nghiemthuquanly_chuyengiaadd->ngaykt=$req->ngaykt;
      $nghiemthuquanly_chuyengiaadd->danhgiakhoiluong=$req->danhgiakhoiluong;
      $nghiemthuquanly_chuyengiaadd->danhgiachatluong=$req->danhgiachatluong;
      $nghiemthuquanly_chuyengiaadd->ketluan=$req->ketluan;
      $nghiemthuquanly_chuyengiaadd->kiennghi=$req->kiennghi;
      $nghiemthuquanly_chuyengiaadd->save();

      return redirect('quan-tri/thong-bao-gui-bien-ban-nghiem-thu');
   }

   public function taobienbanthcsth($id){

    $nghiemthucapcosoid=nghiemthucapcoso::find($id);


    $phuluckhoiluongtts=phuluckhoiluongtt::orderBy('id','ASC')->where('id_nhiemvu_donvi', $nghiemthucapcosoid->id_nhiemvu_donvi)->get();
   // dd($phuluckhoiluongtts);

    return view('hoidongnghiemthu.taobienbanthcsth',['phuluckhoiluongtts'=>$phuluckhoiluongtts,'nghiemthucapcosoid'=>$nghiemthucapcosoid]);

  }

  

   public function savetaobienbanthcs($id, Request $req){

    $nghiemthucapcosoid=nghiemthucapcoso::find($id);

    $nghiemthucapcosoid->danhgiakhoiluong=$req->danhgiakhoiluong;
    $nghiemthucapcosoid->danhgiachatluong=$req->danhgiachatluong;
    $nghiemthucapcosoid->ketluan=$req->ketluan;
    $nghiemthucapcosoid->kiennghi=$req->kiennghi;
        $nghiemthucapcosoid->ngabt=$req->ngabt;
    $nghiemthucapcosoid->ngaykt=$req->ngaykt;
    if($req->hasFile('filethkqnt')){

      $file =$req->file('filethkqnt');

      $name =$file ->getclientoriginalname();
      $Hinh =str_random(4)."_".$name;


      while(file_exists("public/tailieu/".$Hinh))
      {

        $Hinh =str_random(4)."_".$name;
      }
      $file->move("public/tailieu/",$Hinh);

      $nghiemthucapcosoid->filethkqnt=$Hinh;

    }

    $nghiemthucapcosoid->save();

      return redirect('quan-tri/chi-tiet-nghiem-thu-nhiem-vu-tt-co-so/'. $nghiemthucapcosoid->id_nhiemvu_donvi)->with('successfile', 'Thành công');

  }


  
  public function xuattaobienbanthcsth($id){
   $nghiemthucapcosoid=nghiemthucapcoso::find($id);

   $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$nghiemthucapcosoid->id_nhiemvu_donvi)->orderBy('id','ASC')->get();

   $pdfTCC = PDF::loadView('hoidongnghiemthu.xuattaobienbanthcsth',['nghiemthucapcosoid'=>$nghiemthucapcosoid,'phuluckhoiluongtts'=>$phuluckhoiluongtts]);

   return $pdfTCC->stream('tuts_notes.pdf');
 }


   public function taobienbanthqlth($id){

    $nghiemthucapquanlyid=nghiemthucapquanly::find($id);
    $phuluckhoiluongtts=phuluckhoiluongtt::orderBy('id','ASC')->where('id_nhiemvu_donvi', $nghiemthucapquanlyid->id_nhiemvu_donvi)->get();
    return view('hoidongnghiemthu.taobienbanthqlth',['phuluckhoiluongtts'=>$phuluckhoiluongtts,'nghiemthucapquanlyid'=>$nghiemthucapquanlyid]);

  }


  public function savetaobienbanthql($id, Request $req){
    $nghiemthucapquanlyid=nghiemthucapquanly::find($id);
    $nghiemthucapquanlyid->danhgiakhoiluong=$req->danhgiakhoiluong;
    $nghiemthucapquanlyid->danhgiachatluong=$req->danhgiachatluong;
    $nghiemthucapquanlyid->ketluan=$req->ketluan;
    $nghiemthucapquanlyid->kiennghi=$req->kiennghi;
    $nghiemthucapquanlyid->ngabt=$req->ngabt;
    $nghiemthucapquanlyid->ngaykt=$req->ngaykt;

    if($req->hasFile('filethkqnt')){

      $file =$req->file('filethkqnt');

      $name =$file ->getclientoriginalname();
      $Hinh =str_random(4)."_".$name;


      while(file_exists("public/tailieu/".$Hinh))
      {

        $Hinh =str_random(4)."_".$name;
      }
      $file->move("public/tailieu/",$Hinh);

      $nghiemthucapquanlyid->filethkqnt=$Hinh;

    }

      



    $nghiemthucapquanlyid->save();

    return redirect('quan-tri/chi-tiet-nhiem-vu-gia-trung-tam/'. $nghiemthucapquanlyid->id_nhiemvu_donvi)->with('successfile', 'Thành công');

  }



  public function xuattaobienbanthqlth($id){
    $nghiemthucapquanlyid=nghiemthucapquanly::find($id);

    $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$nghiemthucapquanlyid->id_nhiemvu_donvi)->orderBy('id','ASC')->get();

    $pdfTCC = PDF::loadView('hoidongnghiemthu.xuattaobienbanthqlth',['nghiemthucapquanlyid'=>$nghiemthucapquanlyid,'phuluckhoiluongtts'=>$phuluckhoiluongtts]);

    return $pdfTCC->stream('tuts_notes.pdf');
  }


    public function guibienbannghiemthucoso($id, Request $req){

      $nghiemthucoso_chuyengia=nghiemthucoso_chuyengia::find($id);

      if($req->hasFile('bienban')){

        $file =$req->file('bienban');

        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;


        while(file_exists("public/tailieu/".$Hinh))
        {

          $Hinh =str_random(4)."_".$name;
        }
        $file->move("public/tailieu/",$Hinh);

        $nghiemthucoso_chuyengia->bienban=$Hinh;

      }

       $nghiemthucoso_chuyengia->trangthai=1;
       $nghiemthucoso_chuyengia->save();
      
       return redirect('quan-tri/hoi-dong-nghiem-thu')->with('successfile', 'Gửi biên bản thành công');

    }

  

    public function guilaibienbancs($id, Request $req){

      $nghiemthucoso_chuyengia=nghiemthucoso_chuyengia::find($id);


      $nghiemthucoso_chuyengia->bienban=null;
      $nghiemthucoso_chuyengia->trangthai=0;
      $nghiemthucoso_chuyengia->save();
      return back()->with('messgguilai', 'Yêu cầu Gửi lại biên bản thành công');
      

    }



    public function guilaibienbanql($id, Request $req){

      $nghiemthucapquanly_chuyengiaid=nghiemthucapquanly_chuyengia::find($id);

      
      $nghiemthucapquanly_chuyengiaid->bienban=null;
      $nghiemthucapquanly_chuyengiaid->trangthai=0;
      $nghiemthucapquanly_chuyengiaid->save();
      return back()->with('messgguilai', 'Yêu cầu gửi lại biên bản thành công');
      

    }

    




  public function xuatbienbanntcs6t($id){
   $nghiemthucoso_chuyengiaid=nghiemthucoso_chuyengia::find($id);
   $nghiemthucapcosoid=nghiemthucapcoso::find($nghiemthucoso_chuyengiaid->id_nvcs);

   $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$nghiemthucapcosoid->id_nhiemvu_donvi)->where('id_chuyengiacs12t',  $nghiemthucoso_chuyengiaid->id_quantri)->orderBy('id','ASC')->get();
   $pdfTCC = PDF::loadView('hoidongnghiemthu.xuatbienbanntcs6t',['nghiemthucoso_chuyengiaid'=>$nghiemthucoso_chuyengiaid,'nghiemthucapcosoid'=>$nghiemthucapcosoid,'phuluckhoiluongtts'=>$phuluckhoiluongtts]);

   return $pdfTCC->stream('tuts_notes.pdf');
  }





  public function xuatbienbanntcs12t($id){
   $nghiemthucoso_chuyengiaid=nghiemthucoso_chuyengia::find($id);

   $nghiemthucapcosoid=nghiemthucapcoso::find($nghiemthucoso_chuyengiaid->id_nvcs);

   $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$nghiemthucapcosoid->id_nhiemvu_donvi)->where('id_chuyengiacs6t',  $nghiemthucoso_chuyengiaid->id_quantri)->orderBy('id','ASC')->get();

   $pdfTCC = PDF::loadView('hoidongnghiemthu.xuatbienbanntcs12t',['nghiemthucoso_chuyengiaid'=>$nghiemthucoso_chuyengiaid,'nghiemthucapcosoid'=>$nghiemthucapcosoid,'phuluckhoiluongtts'=>$phuluckhoiluongtts]);

   return $pdfTCC->stream('tuts_notes.pdf');
  }


  
  public function xuatbienbanntql6t($id){

   $nghiemthucapquanly_chuyengiaid=nghiemthucapquanly_chuyengia::find($id);


   $nghiemthucapquanlyid=nghiemthucapquanly::find($nghiemthucapquanly_chuyengiaid->id_ntql);


   $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$nghiemthucapquanlyid->id_nhiemvu_donvi)->where('id_chuyengiaql6t',  $nghiemthucapquanly_chuyengiaid->id_quantri)->orderBy('id','ASC')->get();

   $pdfTCC = PDF::loadView('hoidongnghiemthu.xuatbienbanntql6t',['nghiemthucapquanly_chuyengiaid'=>$nghiemthucapquanly_chuyengiaid,'nghiemthucapquanlyid'=>$nghiemthucapquanlyid,'phuluckhoiluongtts'=>$phuluckhoiluongtts]);

   return $pdfTCC->stream('tuts_notes.pdf');
 }


  public function xuatbienbanntql12t($id){

   $nghiemthucapquanly_chuyengiaid=nghiemthucapquanly_chuyengia::find($id);
   $nghiemthucapquanlyid=nghiemthucapquanly::find($nghiemthucapquanly_chuyengiaid->id_ntql);
   $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$nghiemthucapquanlyid->id_nhiemvu_donvi)->where('id_chuyengiaql12t',  $nghiemthucapquanly_chuyengiaid->id_quantri)->orderBy('id','ASC')->get();

   $pdfTCC = PDF::loadView('hoidongnghiemthu.xuatbienbanntql12t',['nghiemthucapquanly_chuyengiaid'=>$nghiemthucapquanly_chuyengiaid,'nghiemthucapquanlyid'=>$nghiemthucapquanlyid,'phuluckhoiluongtts'=>$phuluckhoiluongtts]);

   return $pdfTCC->stream('tuts_notes.pdf');
 }

 

 public function thongbanguibienbannt(){

  
  return view('hoidongnghiemthu.thongbanguibienbannt');

}



public function downloaddongiacs($id_nhiemvu_donvi,$loaint){
  $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$id_nhiemvu_donvi)->orderBy('id','ASC')->get();

  if($loaint==6)
  {
   $customer_array[] = array('STT','Nội dung','đơn vị tính','Đơn giá được duyệt','Khối lượng được duyệt', 'Dự toán được duyệt','Khối lượng NT 6 tháng đầu năm','Đơn giá điều chỉnh (nếu có)','Thành tiền');

  
   foreach($phuluckhoiluongtts as $customer)
   {
    $ttien=0;
    if($customer->dongiadc6tcs !=null){
       $ttien=$customer->dongiadc6tcs*$customer->ntcs6t;
    }else{
      $ttien=$customer->dongia*$customer->ntcs6t;
    }

    $customer_array[] = array(
      'STT'=>$customer->stt,
      'Nội dung' => $customer->noidung,
      'đơn vị tính' => $customer->dvt,
      'Đơn giá được duyệt' => $customer->dongia,
      'Khối lượng được duyệt' => $customer->khoiluong,
      'Dự toán được duyệt' => $customer->dutoanpheduyet,
      'Khối lượng NT 6 tháng đầu năm' => $customer->ntcs6t,
      'Đơn giá điều chỉnh (nếu có)' => $customer->dongiadc6tcs,
      'Thành tiền' => $ttien,
    );
  }
}else 
{

 $customer_array[] = array('STT','Nội dung','đơn vị tính','Đơn giá được duyệt','Khối lượng được duyệt', 'Dự toán được duyệt','Khối lượng NT 6 tháng cuối năm','Đơn giá điều chỉnh (nếu có)','Thành tiền');

  
   foreach($phuluckhoiluongtts as $customer)
   {
    
    if($customer->dongiadc6tcs !=null){
       $ttien=$customer->dongiadc12tcs*$customer->ntcs12t;
    }else{
      $ttien=$customer->dongia*$customer->ntcs12t;
    }

    $customer_array[] = array(
      'STT'=>$customer->stt,
      'Nội dung' => $customer->noidung,
      'đơn vị tính' => $customer->dvt,
      'Đơn giá được duyệt' => $customer->dongia,
      'Khối lượng được duyệt' => $customer->khoiluong,
      'Dự toán được duyệt' => $customer->dutoanpheduyet,
      'Khối lượng NT 6 tháng cuối năm' => $customer->ntcs12t,
      'Đơn giá điều chỉnh (nếu có)' => $customer->dongiadc12tcs,
      'Thành tiền' => $ttien,
    );
  }
  }
  Excel::create('datadownload', function($excel) use ($customer_array){
  $excel->setTitle('datadownload');
  $excel->sheet('datadownload', function($sheet) use ($customer_array){
    $sheet->fromArray($customer_array, null, 'A1', false, false);
  });
})->download('xlsx');

}




public function downloaddongiaql($id_nhiemvu_donvi,$loaint){
  $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$id_nhiemvu_donvi)->orderBy('id','ASC')->get();

  if($loaint==6)
  {
   $customer_array[] = array('STT','Nội dung','đơn vị tính','Đơn giá được duyệt','Khối lượng được duyệt', 'Dự toán được duyệt','Khối lượng NT 6 tháng đầu năm','Đơn giá điều chỉnh (nếu có)','Thành tiền');

  
   foreach($phuluckhoiluongtts as $customer)
   {
    $ttien=0;
    if($customer->dongiadc6tql !=null){
       $ttien=$customer->dongiadc6tql*$customer->ntql6t;
    }else{
      $ttien=$customer->dongia*$customer->ntql6t;
    }

    $customer_array[] = array(
      'STT'=>$customer->stt,
      'Nội dung' => $customer->noidung,
      'đơn vị tính' => $customer->dvt,
      'Đơn giá được duyệt' => $customer->dongia,
      'Khối lượng được duyệt' => $customer->khoiluong,
      'Dự toán được duyệt' => $customer->dutoanpheduyet,
      'Khối lượng NT 6 tháng đầu năm' => $customer->ntql6t,
      'Đơn giá điều chỉnh (nếu có)' => $customer->dongiadc6tql,
      'Thành tiền' => $ttien,
    );
  }
}else 
{

 $customer_array[] = array('STT','Nội dung','đơn vị tính','Đơn giá được duyệt','Khối lượng được duyệt', 'Dự toán được duyệt','Khối lượng NT 6 tháng cuối năm','Đơn giá điều chỉnh (nếu có)','Thành tiền');

  
   foreach($phuluckhoiluongtts as $customer)
   {
    
    if($customer->dongiadc12tql !=null){
       $ttien=$customer->dongiadc12tql*$customer->ntql12t;
    }else{
      $ttien=$customer->dongia*$customer->ntql12t;
    }

    $customer_array[] = array(
      'STT'=>$customer->stt,
      'Nội dung' => $customer->noidung,
      'đơn vị tính' => $customer->dvt,
      'Đơn giá được duyệt' => $customer->dongia,
      'Khối lượng được duyệt' => $customer->khoiluong,
      'Dự toán được duyệt' => $customer->dutoanpheduyet,
      'Khối lượng NT 6 tháng cuối năm' => $customer->ntql12t,
      'Đơn giá điều chỉnh (nếu có)' => $customer->dongiadc12tql,
      'Thành tiền' => $ttien,
    );
  }
  }
  Excel::create('datadownload', function($excel) use ($customer_array){
  $excel->setTitle('datadownload');
  $excel->sheet('datadownload', function($sheet) use ($customer_array){
    $sheet->fromArray($customer_array, null, 'A1', false, false);
  });
})->download('xlsx');

}






}
