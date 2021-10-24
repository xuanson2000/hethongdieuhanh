<?php
namespace App\Http\Controllers;
use App\quyen;
use App\quantri;
use App\vaitro;
use App\vaitro_quyen;
use DB;
use Hash;
use Auth;
use Illuminate\Http\Request;

class controllernguoidung extends Controller
{

	public function index(){
		
		$nguoidungs=DB::table('quantri')->where('phongBan',Auth::guard('quantri')->user()->phongBan)->get();
		

		$vaitros=DB::table('vaitro')->get();
		return view('phanquyen.nguoidung.index',['vaitros'=>$vaitros,'nguoidungs'=>$nguoidungs]);
		unset($vaitros);
		unset($nguoidungs);
		
	}

	
		public function themnguoidung(Request $req){

		$quantri = new quantri;
		$quantri->username= $req ->username;
		$quantri->namclass= $req ->namclass;
        $quantri->phongBan= $req ->phongBan;
         $quantri->chuyengia=0;
		$quantri->password= Hash::make($req->password);

		if($req->hasFile('image')){

    		$file =$req->file('image');

    		$name =$file ->getclientoriginalname();
    		$Hinh =str_random(4)."_".$name;
    		

    		while(file_exists("public/anh/".$Hinh))
    		{

    			$Hinh =str_random(4)."_".$name;
    		}
    		$file->move("public/anh/",$Hinh);
    	
    		$quantri->anh=$Hinh;

    	}
    
    	$quantri->save();

    	// $pe = $req->vaitro;

   		// foreach ($pe as $p) {
   		// 	\DB::table('quantri_vaitro')->insert([
   		// 		'qt_id'=> $quantri->id,
   		// 		'vt_id' => $p
   		// 	]); 
   		// } 

   
    	return redirect('quan-tri/nguoi-dung.html')->with('messgthem','Thêm thành công');
    	


	}

	public function xoanguoidung($id){
		$nguoidung = quantri::find($id);
		$nghiemthucapquanly_chuyengias=DB::table('nghiemthucapquanly_chuyengia')->where('id_quantri',$id)->get();

			$nghiemthucoso_chuyengias=DB::table('nghiemthucoso_chuyengia')->where('id_quantri',$id)->get();

	

		if(count($nghiemthucapquanly_chuyengias)>0 || count($nghiemthucoso_chuyengias)>0 ){

			echo"<script type='text/javascript'>
    		alert('Cảnh báo: Bạn không được xóa được dữ liệu này vì dữ liệu đã được liên kết hoạt trên hệ thống !');
    		window.location='";
    		echo route('nguoidung');
    		echo"'</script>";


		}else{

			$nguoidung->delete();
			return redirect()->back()->with('messgxoa','Xóa thành công');


		}

	
	

	}

	public function suanguoidung($id){

		$nguoidung = quantri::find($id);

		return view('phanquyen.nguoidung.suanguoidung',['nguoidung'=>$nguoidung]);

		unset($nguoidung);

	}

	public function suanguoidungpost(Request $req, $id){

	$nguoidungid= quantri::find($id);

	$nguoidungid->username = $req ->username ;
	$nguoidungid->namclass = $req ->namclass ;

	
	if($req ->hasFile('image')){

		$file =$req->file('image');
		$name =$file ->getclientoriginalname();
		$Hinh =str_random(4)."_".$name;

		while(file_exists("public/anh/".$Hinh))
		{

			$Hinh =str_random(4)."_".$name;
		}
		$file->move("public/anh/",$Hinh);
		unlink("public/anh/".$nguoidungid->anh);
		$nguoidungid->anh=$Hinh;

	}

	
	$nguoidungid->save();

	return redirect('quan-tri/nguoi-dung.html')->with('messgsua','Sửa thành công');

}




}
