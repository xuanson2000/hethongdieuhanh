<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhiemvuchuyenmon;
use Excel;
use DB;
use Auth;
use App\nhiemvu_donvithuchien;
use App\nghiemthucapquanly;
use App\nghiemthucapquanly_chuyengia;
use App\coquanpheduyet;
use App\phuluckhoiluongtt;
class controllernhiemvuchuyenmon extends Controller
{
    
    public function nhiemvuchuyenmuon(){
           $coquanpheduyets=coquanpheduyet::get();
        $nhiemvuchuyenmons=nhiemvuchuyenmon::get();

         //   $nhiemvuchuyenmons=nhiemvuchuyenmon::get();
        return view('nhiemvuchuyenmon.index',['nhiemvuchuyenmons'=>$nhiemvuchuyenmons,'coquanpheduyets'=>$coquanpheduyets]);

    }



  public function chitietnhiemvu($id){

        $nhiemvuchuyenmonid=nhiemvuchuyenmon::find($id);
        return view('nhiemvuchuyenmon.chitietnhiemvu',['nhiemvuchuyenmonid'=>$nhiemvuchuyenmonid]);

    }
    

    public function themnhiemvuchuyenmon(Request $req){

        $nhiemvuchuyenmon = new nhiemvuchuyenmon;
        $nhiemvuchuyenmon->tennv= $req ->tennv;
        $nhiemvuchuyenmon->soqd= $req ->soqd;
        $nhiemvuchuyenmon->ngayqd= $req ->ngayqd;
        $nhiemvuchuyenmon->muctieu= $req ->muctieu;
        $nhiemvuchuyenmon->thoigianthuchien= $req ->thoigianthuchien;
        $nhiemvuchuyenmon->tongdutoan= $req ->tongdutoan;
         $nhiemvuchuyenmon->id_coquanpd= $req ->id_coquanpd;

        
        $nhiemvuchuyenmon->dieuchinh=2;

        if($req->hasFile('file_quyetdinhpdkhthvn')){

            $file =$req->file('file_quyetdinhpdkhthvn');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_quyetdinhpdkhthvn=$Hinh;

        }



        if($req->hasFile('file_quyetdinh')){

            $file =$req->file('file_quyetdinh');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_quyetdinh=$Hinh;

        }

        if($req->hasFile('file_hosoquyetdinh')){

            $file =$req->file('file_hosoquyetdinh');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            
            while(file_exists("public/tailieu/".$Hinh))
            {
                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_hosoquyetdinh=$Hinh;

        }

        if($req->hasFile('file_thamdinh')){

            $file =$req->file('file_thamdinh');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_thamdinh=$Hinh;

        }

        if($req->hasFile('file_decuong')){

            $file =$req->file('file_decuong');
            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_decuong=$Hinh;

        }

        if($req->hasFile('file_dathang')){

            $file =$req->file('file_dathang');
            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_dathang=$Hinh;

        }
        
        
        $nhiemvuchuyenmon->save();
        return redirect('quan-tri/danh-sach-nhiem-vu-chuyen-mon')->with('messgthem','Thêm thành công');
    }

    

     public function xoanhiemvu($id){

        $nhiemvuchuyenmondelete= nhiemvuchuyenmon::find($id);
        $nhiemvu_donvithuchiens=nhiemvu_donvithuchien::where('id_nhiemvu',$id)->get();
        if(count($nhiemvu_donvithuchiens)>0){

          echo"<script type='text/javascript'>
          alert('Cảnh báo: Bạn không được xóa được dữ liệu này vì dữ liệu đã được liên kết hoạt trên hệ thống !');
          window.location='";
          echo route('chitietnhiemvu',[$id]);
          echo"'</script>";


        }else{
          $nhiemvuchuyenmondelete->delete();
           return redirect('quan-tri/danh-sach-nhiem-vu-chuyen-mon')->with('messgxoa','Xóa  thành công');

      }
      
      
    }


    public function suanhiemvu($id){
        $nhiemvuchuyenmonedit=nhiemvuchuyenmon::find($id);

        return view('nhiemvuchuyenmon.suanhiemvu',['nhiemvuchuyenmonedit'=>$nhiemvuchuyenmonedit]);
    }



public function suanhiemvupost($id ,Request $req){
      

        $nhiemvuchuyenmon = nhiemvuchuyenmon::find($id);
        $nhiemvuchuyenmon->tennv= $req ->tennv;
        $nhiemvuchuyenmon->soqd= $req ->soqd;
        $nhiemvuchuyenmon->ngayqd= $req ->ngayqd;
        $nhiemvuchuyenmon->muctieu= $req ->muctieu;
        $nhiemvuchuyenmon->thoigianthuchien= $req ->thoigianthuchien;
        $nhiemvuchuyenmon->tongdutoan= $req ->tongdutoan;
        $nhiemvuchuyenmon->dieuchinh=2;

        if($req->hasFile('file_quyetdinh')){

            $file =$req->file('file_quyetdinh');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_quyetdinh=$Hinh;

        }

        if($req->hasFile('file_hosoquyetdinh')){

            $file =$req->file('file_hosoquyetdinh');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            
            while(file_exists("public/tailieu/".$Hinh))
            {
                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_hosoquyetdinh=$Hinh;

        }

        if($req->hasFile('file_thamdinh')){

            $file =$req->file('file_thamdinh');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_thamdinh=$Hinh;

        }

        if($req->hasFile('file_decuong')){

            $file =$req->file('file_decuong');
            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_decuong=$Hinh;

        }

        if($req->hasFile('file_dathang')){

            $file =$req->file('file_dathang');
            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_dathang=$Hinh;

        }
        
        
        $nhiemvuchuyenmon->save();
        return redirect('quan-tri/danh-sach-nhiem-vu-chuyen-mon')->with('messgsua','Sửa thành công');

    }




   public function dieuchinhnhiemvu($id){
      
        return view('nhiemvuchuyenmon.dieuchinhnhiemvu',['id_nv'=>$id]);
    }

    
    public function dieuchinhnhiemvupost($id, Request $req){

        $nhiemvuchuyenmonold= nhiemvuchuyenmon::find($id);
        $nhiemvuchuyenmonold->dieuchinh=0;
         $nhiemvuchuyenmonold->save();
       $nhiemvuchuyenmon = new nhiemvuchuyenmon;
        $nhiemvuchuyenmon->tennv= $req ->tennv;
        $nhiemvuchuyenmon->soqd= $req ->soqd;
        $nhiemvuchuyenmon->ngayqd= $req ->ngayqd;
        $nhiemvuchuyenmon->muctieu= $req ->muctieu;
        $nhiemvuchuyenmon->thoigianthuchien= $req ->thoigianthuchien;
        $nhiemvuchuyenmon->tongdutoan= $req ->tongdutoan;
        $nhiemvuchuyenmon->lydodieuchinh= $req ->lydodieuchinh;
        $nhiemvuchuyenmon->dieuchinh=1;

        if( $nhiemvuchuyenmonold->landieuchinh==null){
            $nhiemvuchuyenmonold->landieuchinh=1;

        }else{
            $nhiemvuchuyenmonold->landieuchinh=$nhiemvuchuyenmonold->landieuchinh+1;
        }


        $nhiemvuchuyenmon->id_nv= $id;

        if($req->hasFile('file_quyetdinh')){

            $file =$req->file('file_quyetdinh');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_quyetdinh=$Hinh;

        }

        if($req->hasFile('file_hosoquyetdinh')){

            $file =$req->file('file_hosoquyetdinh');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            
            while(file_exists("public/tailieu/".$Hinh))
            {
                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_hosoquyetdinh=$Hinh;

        }

        if($req->hasFile('file_thamdinh')){

            $file =$req->file('file_thamdinh');

            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_thamdinh=$Hinh;

        }

        if($req->hasFile('file_decuong')){

            $file =$req->file('file_decuong');
            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_decuong=$Hinh;

        }

        if($req->hasFile('file_dathang')){

            $file =$req->file('file_dathang');
            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;

            while(file_exists("public/tailieu/".$Hinh))
            {

                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);

            $nhiemvuchuyenmon->file_dathang=$Hinh;

        }
        
        
        $nhiemvuchuyenmon->save();
        return redirect('quan-tri/danh-sach-nhiem-vu-chuyen-mon')->with('messgthem','Thêm thành công');



    }


    public function dathang($id){
         $phongbans=DB::table('phongban')->where('id','<>',8)->get();
        $nhiemvuchuyenmonid=nhiemvuchuyenmon::find($id);
        return view('nhiemvuchuyenmon.dathang',['nhiemvuchuyenmonid'=>$nhiemvuchuyenmonid,'phongbans'=>$phongbans,'id_nv'=>$id]);
    }

    

    public function dathangpost($id,Request $req){
        $nhiemvuchuyenmonid=nhiemvuchuyenmon::find($id);
        $nhiemvu_donvithuchien = new nhiemvu_donvithuchien;
        $nhiemvu_donvithuchien->id_nhiemvu =$id;
        $nhiemvu_donvithuchien->id_donvi =$req->id_donvi;
        $nhiemvu_donvithuchien->namthuchien =$req->namthuchien;
        $nhiemvu_donvithuchien->ngayqd =$req->ngayqd;
        $nhiemvu_donvithuchien->soqd =$req->soqd;
        $nhiemvu_donvithuchien->noidung =$req->noidung;
        $nhiemvu_donvithuchien->dutoandathang=$req->dutoandathang;
        $nhiemvu_donvithuchien->dieuchinh= $nhiemvuchuyenmonid->id_nv;

        if($req->hasFile('file')){
            $file =$req->file('file');
            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            while(file_exists("public/tailieu/".$Hinh))
            {
                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);
            $nhiemvu_donvithuchien->file=$Hinh;
        }

        $nhiemvu_donvithuchien->save();


        $this->validate($req,[
          'select_file'  => 'required|mimes:xls,xlsx'
      ]);

        $path = $req->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

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

                     'dongia'   => $value['don_gia'],
                      'chithuongxuyen'   => $value['chi_thuong_xuyen'],
                       'khongthuongxuyen'   => $value['khong_thuong_xuyen'],
                    'id_nhiemvu_donvi'=>$nhiemvu_donvithuchien->id
                );
            }
        }

        if(!empty($insert_data))
        {
           DB::table('phuluckhoiluongtt')->insert($insert_data);
        }

     return redirect('quan-tri/danh-sach-nhiem-vu-chuyen-mon')->with('messgthem','Thêm thành công');
 }


 
 public function xuatfilehmc($id){

    $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$id)->orderBy('id','ASC')->get();



    $customer_array[] = array('ID','KLNTCS6T','KLNTQL6T','STT','Nội dung','Đơn vị tính','Khối lượng','Đơn giá','Dự toán được phê duyệt','Chi thường xuyên','Không thường xuyên');

    foreach($phuluckhoiluongtts as $customer)
    {

        $customer_array[] = array(

            'ID'=>$customer->id,
            'KLNTCS6T'=>$customer->ntcs6t,
            'KLNTQL6T'=>$customer->ntqk6t,

            'STT'=>$customer->stt,
            'Nội dung'=>$customer->noidung,
            'Đơn vị tính'=>$customer->dvt,
            'Khối lượng'=>'',
            'Đơn giá'=>'',
            'Dự toán được phê duyệt'=>'',
            'Chi thường xuyên'=>'',
            'Không thường xuyên'=>'',
        );
    }

    Excel::create('datadownload', function($excel) use ($customer_array){
        $excel->setTitle('datadownload');
        $excel->sheet('datadownload', function($sheet) use ($customer_array){
            $sheet->fromArray($customer_array, null, 'A1', false, false);
        });
    })->download('xlsx');

    
}

 


    public function dieuchinhnhiemvudonvi($id){

        $nhiemvu_donvithuchienid=nhiemvu_donvithuchien::find($id);
        $phongbans=DB::table('phongban')->find($nhiemvu_donvithuchienid->id_donvi);
        $nhiemvuchuyenmonid=nhiemvuchuyenmon::find($nhiemvu_donvithuchienid->id_nhiemvu);

        return view('nhiemvuchuyenmon.dieuchinhnhiemvudonvi',['nhiemvuchuyenmonid'=>$nhiemvuchuyenmonid,'phongbans'=>$phongbans,'nhiemvu_donvithuchienid'=>$nhiemvu_donvithuchienid]);
    }

    

 public function savedieuchinhnhiemvudonvi($id,Request $req){
        $nhiemvu_donvithuchienid=nhiemvu_donvithuchien::find($id);

 
        $nhiemvu_donvithuchien = new nhiemvu_donvithuchien;
        $nhiemvu_donvithuchien->id_nhiemvu = $nhiemvu_donvithuchienid->id_nhiemvu;
        $nhiemvu_donvithuchien->id_donvi =$req->id_donvi;
        $nhiemvu_donvithuchien->namthuchien =$req->namthuchien;
        $nhiemvu_donvithuchien->ngayqd =$req->ngayqd;
        $nhiemvu_donvithuchien->soqd =$req->soqd;
        $nhiemvu_donvithuchien->noidung =$req->noidung;
        $nhiemvu_donvithuchien->dutoandathang=$req->dutoandathang;
        $nhiemvu_donvithuchien->dieuchinh= 1;
         $nhiemvu_donvithuchien->id_nhiemvu_donvithuchien=$id;
        if($nhiemvu_donvithuchienid->landieuchinh==null){
           
           
          $nhiemvu_donvithuchien->landieuchinh= 1;


        }else{
           
          $nhiemvu_donvithuchien->landieuchinh=$nhiemvu_donvithuchienid->landieuchinh+1;
        
        }


        if($req->hasFile('file')){
            $file =$req->file('file');
            $name =$file ->getclientoriginalname();
            $Hinh =str_random(4)."_".$name;
            while(file_exists("public/tailieu/".$Hinh))
            {
                $Hinh =str_random(4)."_".$name;
            }
            $file->move("public/tailieu/",$Hinh);
            $nhiemvu_donvithuchien->file=$Hinh;
        }

        $nhiemvu_donvithuchien->save();



        $this->validate($req,[
          'select_file'  => 'required|mimes:xls,xlsx'
      ]);

        $path = $req->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count() > 0)
        {

            foreach($data->toArray() as $key => $value)

            {
                $insert_data[] = array(
                    'stt'   => $value['stt'],
                     'ntcs6t'   => $value['klntcs6t'],
                      'ntql6t'   => $value['klntql6t'],
                    'noidung'   => $value['noi_dung'],
                    'dvt'   => $value['don_vi_tinh'],
                    'khoiluong'   => $value['khoi_luong'],
                    'dutoanpheduyet'   => $value['du_toan_duoc_phe_duyet'],

                    'dongia'   => $value['don_gia'],
                    'chithuongxuyen'   => $value['chi_thuong_xuyen'],
                    'khongthuongxuyen'   => $value['khong_thuong_xuyen'],
                    'id_phuluccu'   => $value['id'],
                    'id_nhiemvu_donvi'=>$nhiemvu_donvithuchien->id
                );
            }
        }

        if(!empty($insert_data))
        {
           DB::table('phuluckhoiluongtt')->insert($insert_data);
        }

     return redirect('quan-tri/chi-tiet-nhiem-vu-chuyen-mon/'.$nhiemvu_donvithuchienid->id_nhiemvu)->with('messgthem','Thêm thành công');
 }



public function xoanhiemvudonvi($id){

     $nhiemvu_donvithuchiendelete = nhiemvu_donvithuchien::find($id);

     
     $nghiemthucss=DB::table('nghiemthucapcoso')->where('id_nhiemvu_donvi',$id)->get();
      $nghiemthuqls=DB::table('nghiemthucapquanly')->where('id_nhiemvu_donvi',$id)->get();
     

     if(count($nghiemthucss)>0 || count($nghiemthuqls)>0){
        echo"<script type='text/javascript'>
            alert('Cảnh báo: Bạn không được xóa được dữ liệu này vì dữ liệu đã được liên kết hoạt trên hệ thống !');
            window.location='";
            echo route('chitietnhiemvu',[$nhiemvu_donvithuchiendelete->id_nhiemvu]);
            echo"'</script>";

    }else{

        $nhiemvu_donvithuchiendelete->delete();

        return redirect('quan-tri/chi-tiet-nhiem-vu-chuyen-mon/'.$nhiemvu_donvithuchiendelete->id_nhiemvu)->with('messgxoa','Xóa thành công');

     }



}

public function nhiemvuchuyenmonnghiemthu(){

    $nhiemvuchuyenmons=nhiemvuchuyenmon::where('dieuchinh','<>',0)->get();
    return view('nhiemvuchuyenmon.nhiemvuchuyenmonnghiemthu',['nhiemvuchuyenmons'=>$nhiemvuchuyenmons]);

}

public function chitietnghiemthu($id){
    $nhiemvuchuyenmonid=nhiemvuchuyenmon::find($id);

    $nhiemvu_donvis=nhiemvu_donvithuchien::where('id_nhiemvu',$id)->get();
    return view('nhiemvuchuyenmon.chitietnghiemthu',['nhiemvuchuyenmonid'=>$nhiemvuchuyenmonid,'nhiemvu_donvis'=> $nhiemvu_donvis]);

}

public function chitietnhiemvugiaott($id){

   $nhiemvu_donvithuchien=nhiemvu_donvithuchien::find($id);
   $quantris=DB::table('quantri')->get();

   return view('nhiemvuchuyenmon.chitietnhiemvugiaott',['nhiemvu_donvithuchien'=>$nhiemvu_donvithuchien,'quantris'=>$quantris]);

}


public function themnghiemthucapthucapquanly($id, Request $req){

    $nghiemthucapquanlyid=nghiemthucapquanly::where('id_nhiemvu_donvi',$id)->where('loainghiemthu',$req->loainghiemthu)->get();

    if(count($nghiemthucapquanlyid)>0){

       echo"<script type='text/javascript'>
          alert('Thông báo: Hội đồng nghiệm thu đã được thành lập!');
          window.location='";
          echo route('chitietnhiemvugiaott',[$id]);
          echo"'</script>";
 }else{

   $nghiemthucapquanly= new nghiemthucapquanly;
   $nghiemthucapquanly->soqd=$req->soqd;
   $nghiemthucapquanly->ngayqd=$req->ngayqd;
   $nghiemthucapquanly->noidung=$req->noidung;
   $nghiemthucapquanly->loainghiemthu=$req->loainghiemthu;
   $nghiemthucapquanly->id_nhiemvu_donvi=$id;
   $nghiemthucapquanly->cancuphaply=$req->cancuphaply;
   $nghiemthucapquanly->thanhphannt=$req->thanhphannt;
   $nghiemthucapquanly->bophanthuchien=$req->bophanthuchien;

   if($req->hasFile('file')){
    $file =$req->file('file');
    $name =$file ->getclientoriginalname();
    $Hinh =str_random(4)."_".$name;
    while(file_exists("public/tailieu/".$Hinh))
    {
        $Hinh =str_random(4)."_".$name;
    }
    $file->move("public/tailieu/",$Hinh);
    $nghiemthucapquanly->file=$Hinh;
}

$nghiemthucapquanly->save();

$id_quantris=$req->id_quantri;
foreach($id_quantris as $id_quantr){
  $nghiemthucapquanly_chuyengia= new nghiemthucapquanly_chuyengia;
  $nghiemthucapquanly_chuyengia->id_ntql=$nghiemthucapquanly->id;
  $nghiemthucapquanly_chuyengia->id_quantri=$id_quantr;
  $nghiemthucapquanly_chuyengia->trangthai=0;
  $nghiemthucapquanly_chuyengia->save();

}

return redirect('quan-tri/chi-tiet-nhiem-vu-gia-trung-tam/'.$id)->with('messgthem','Thêm thành công');


}

}




public function xoanghiemthuql($id){

    $nghiemthucapquanlyid=nghiemthucapquanly::find($id);
    $checkntcs=$nghiemthucapquanlyid->ngaykt;
    
    $nghiemthucapquanly_chuyengias=nghiemthucapquanly_chuyengia::where('id_ntql',$id)->get();
    $checkchuyengia=0;
    foreach($nghiemthucapquanly_chuyengias as $nghiemthucapquanly_chuyengia){
        if( $nghiemthucapquanly_chuyengia->trangthai==1)
        {
           $checkchuyengia=$checkchuyengia+1;
       }

   }


   if( $checkntcs!=null ||  $checkchuyengia>0 ){

     echo"<script type='text/javascript'>
     alert('Thông báo: Không thể xóa được quyết định hội đồng nghiệm thu này, vì hội đồng nghiệm thu đã hoạt động!');
     window.location='";
     echo route('chitietnhiemvugiaott',[$nghiemthucapquanlyid->id_nhiemvu_donvi]);
     echo"'</script>";

 }else{
  $nghiemthucapquanlyid->delete();
  foreach($nghiemthucapquanly_chuyengias as $nghiemthucapquanly_chuyengia){
    $nghiemthucapquanly_chuyengia->delete();
}

return redirect('quan-tri/chi-tiet-nghiem-thu-nhiem-vu-tt-co-so/'.$nghiemthucapquanlyid->id_nhiemvu_donvi)->with('messgthem','Xóa thành công');


}



}




    public function giaohmcvntql($id_chuyengia,$id_ntql){
  

        $nghiemthucapquanlyid=nghiemthucapquanly::find($id_ntql);
        $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$nghiemthucapquanlyid->id_nhiemvu_donvi)->orderBy('id','ASC')->get();

       return view('nhiemvuchuyenmon.giaohmcvntql',['phuluckhoiluongtts'=>$phuluckhoiluongtts,'id_chuyengia'=>$id_chuyengia,'loaint'=> $nghiemthucapquanlyid->loainghiemthu,'id_nhiemvu_donvi'=>$nghiemthucapquanlyid->id_nhiemvu_donvi]);

   }

   
    public function savegiaohmcvntql($loaint,$id_chuyengia,$id_nhiemvu_donvi,Request $req){

      $mahmcvs=$req->example2;

        $i=0;
      if($loaint==6){
         DB::table('phuluckhoiluongtt')->where('id_chuyengiaql6t', $id_chuyengia)->where('id_nhiemvu_donvi', $id_nhiemvu_donvi)->update(['id_chuyengiacs6t' => null]);


        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->id_chuyengiaql6t= $id_chuyengia;
          $phuluckhoiluongtts->save();
          $i++;
        }

      }else{

         DB::table('phuluckhoiluongtt')->where('id_chuyengiaql12t', $id_chuyengia)->where('id_nhiemvu_donvi', $id_nhiemvu_donvi)->update(['id_chuyengiacs6t' => null]);

        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
         
            $phuluckhoiluongtts->id_chuyengiaql12t= $id_chuyengia;
          $phuluckhoiluongtts->save();
          $i++;

        }

      }

       return redirect('quan-tri/chi-tiet-nhiem-vu-gia-trung-tam/'.$id_nhiemvu_donvi)->with('messgthem','Giao nhiệm vụ nghiêm thu thành công');

   }




   public function dieuchinhdongiaql($id_nhiemvu_donvi,$loaint){
    $phuluckhoiluongtts=phuluckhoiluongtt::where('id_nhiemvu_donvi',$id_nhiemvu_donvi)->orderBy('id','ASC')->get();
    return view('nhiemvuchuyenmon.dieuchinhdongiaql',['phuluckhoiluongtts'=>$phuluckhoiluongtts,'loaint'=>$loaint,'id_nhiemvu_donvi'=>$id_nhiemvu_donvi]);

}



public function savedieuchinhdongiaql($id_nhiemvu_donvi,$loaint,Request $req){

      
      $mahmcvs=$req->example2;
      $dongiadc[]=$req->dongiadc;
     
        $i=0;
      if($loaint==6){
        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->dongiadc6tql=$dongiadc[0][$i];
          
          $phuluckhoiluongtts->save();
          $i++;
        }

      }else{
        foreach($mahmcvs as $mahmcv){
          $phuluckhoiluongtts=phuluckhoiluongtt::find($mahmcv);
          $phuluckhoiluongtts->dongiadc12tql=$dongiadc[0][$i];
          $phuluckhoiluongtts->save();
          $i++;

        }

      }

     
  
  return redirect('quan-tri/chi-tiet-nhiem-vu-gia-trung-tam/'.$id_nhiemvu_donvi)->with('messgthem','Thêm thành công');
   }


   



}
