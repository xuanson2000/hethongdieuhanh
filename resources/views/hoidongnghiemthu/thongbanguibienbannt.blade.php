@extends('khoangsan.layout')
@section("content12")

<style type="text/css">
   th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 14px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 14px;
 }
 
</style>
<section class="content-header" style="">
	<p style="font-size: 17px; color: #1BB2BA; margin-bottom:2px; padding-left: 13px; padding-bottom: 10px; font-weight:bold;">
		HỘI ĐỒNG NGHIỆM THU
	</p>

	<ol class="breadcrumb">

	</ol>
</section>



<div class="container" style=" background-image: url('https://i.pinimg.com/originals/bf/fc/bb/bffcbb3c0a5f66158141ae3e6c89bf11.jpg'); background-repeat: no-repeat;background-position: center;background-size: cover;width: 100%; height:100%;">
  
   



<center><h2 style="font-weight:bold; color: #4ebde5; margin-top:180px;">CẢM ƠN</h2></center>
<center> <h4 style="color: #4ebde5;"> Ông/ Bà:  {{Auth::guard('quantri')->user()->namclass}} đã gửi biên bản nghiệm thu</h4> </center>
<center> <h4 style="color:#4ebde5;"> Chúc Ông /bà có một ngày làm việc hiệu quả</h4> </center>


<table style="margin: 0 auto; margin-bottom:250px; ">
	<tr>
		<th>
			<a href="{{route('nghiemthuindex')}}" type="button" class="btn btn-warning">Về Trang chủ</a>
		</th>
		<th>
			
		</th>
	</tr>
</table>

  

</div>

  @endsection




