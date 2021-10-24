@extends('khoangsan1.layout')
@section("content13")

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
				
				<th>Nội dung</th>
				<th>Dự toán đặt hàng</th>
				<th>Năm thực hiện</th>
				<th>Lần điều chỉnh</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@foreach($nhiemvu_donvithuchiens as $nhiemvu_donvithuchien)
			<tr>
				<td>{{$loop->index+1}}</td>
				<td>{{$nhiemvu_donvithuchien->soqd}} <br> <i>{{$nhiemvu_donvithuchien->ngayqd}}</i> </td>
				
				<td>{{$nhiemvu_donvithuchien->noidung}}</td>
				
				<td>{{$nhiemvu_donvithuchien->dutoandathang}} (vnđ)</td>
				<td>{{$nhiemvu_donvithuchien->namthuchien}}</td>
				<td style=" font-weight: bold;">{{$nhiemvu_donvithuchien->landieuchinh}}</td>
				<td>
					

					<a title="" href="{{route('chitietnghiemthutt',[$nhiemvu_donvithuchien->id])}}"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Chi tiết
					</a>

				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


</div>
@endsection




