<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khoa;
use App\lophoc;
use DB;

class AjaxController extends Controller
{
    //
    public function getkhoi($idkhoi){

     $khoi=DB::table('quantri')->where('index',$idkhoi)->get();

      foreach ($khoi as $item){
      	echo "<option value='".$item->id."'>".$item->namclass."</option>";
      }
  }

    public function getkhoa($idKhoa,$idKhoahoc){

		$lop=lophoc::where('idKhoa',$idKhoa)->where('idKhoahoc',$idKhoahoc)->get();
		foreach ($lop as $itemlop) {
			echo "<option value='".$itemlop->id."'>".$itemlop->tenLop."</option>";
		}
	}

	
	public function getlophoc($idKhoa,$idKhoahoc){

		$lop=lophoc::where('idKhoa',$idKhoa)->where('idKhoahoc',$idKhoahoc)->get();
		foreach ($lop as $itemlop) {
			echo "<option value='".$itemlop->id."'>".$itemlop->tenLop."</option>";
		}
	}
	public function getlophoc2($idKhoa,$idKhoahoc){

		$lop=lophoc::where('idKhoa',$idKhoa)->where('idKhoahoc',$idKhoahoc)->get();
		foreach ($lop as $itemlop) {
			echo "<option value='".$itemlop->id."'>".$itemlop->tenLop."</option>";
		}
	}

	  public function getmonhoc($idKhoa){

	  	$sv=DB::table('khoa')
      ->join('mohoc_khoa', 'khoa.id', '=', 'mohoc_khoa.idKhoa')
      ->join('mohoc', 'mohoc_khoa.idMonhoc', '=', 'mohoc.id')
      ->where('idKhoa',$idKhoa)
      ->select('mohoc.*')
      ->get();//->toArray();
    
		foreach ($sv as $itemlop) {
			echo "<option value='".$itemlop->id."'>".$itemlop->tenMH."</option>";
		}
	}
}
