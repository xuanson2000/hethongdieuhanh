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
		DANH SÁCH NHIỆM VỤ CHUYÊN MÔN NGHIỆM THU
	</p>

	<ol class="breadcrumb">
		
	</ol>
</section>



<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

	@if(Session::has('messgsua'))
	<div class="alert alert-success">{{Session::get('messgsua')}}</div>
	@endif

	@if(Session::has('messgthem'))
	<div class="alert alert-success">{{Session::get('messgthem')}}</div>
	@endif

	@if(Session::has('messgxoa'))
	<div class="alert alert-success">{{Session::get('messgxoa')}}</div>
	@endif
           
  <table class="table table-bordered">
  	<thead>
  		<tr style="background-color: #AAC1C6;">
  			<th>STT</th>
  			<th>Số QĐ </th>
  			<th>Ngày QĐ</th>
  			<th>Tên nhiệm vụ </th>
  			<th>Mục tiêu</th>
  			<!-- <th>Phạm vi thực hiện</th> -->
  			<th>TG thực hiện</th>
  			<th>Tổng dự toán</th>
  			<th>Thao tác</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach($nhiemvuchuyenmons as $nhiemvuchuyenmon)
  		<tr>
  			<td>{{$loop->index+1}}</td>
  			<td>{{$nhiemvuchuyenmon->soqd}}</td>
  			<td>{{$nhiemvuchuyenmon->ngayqd}}</td>
  			<td>{{$nhiemvuchuyenmon->tennv}}</td>
  			<td>{{$nhiemvuchuyenmon->muctieu}}</td>
  		
  			<td>{{$nhiemvuchuyenmon->thoigianthuchien}}</td>
  			<td>{{$nhiemvuchuyenmon->tongdutoan}}</td>
  			<td>
  				<a title="Chi tiết" href="{{route('chitietnghiemthu',[$nhiemvuchuyenmon->id])}}"><i class="fa fa-folder-open" aria-hidden="true"></i> Chi tiết
  				</a>
  			</td>
  		</tr>
  		@endforeach

  	</tbody>
  </table>


</div>





  @endsection




