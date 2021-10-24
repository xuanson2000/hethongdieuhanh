@extends('khoangsan.layout')
@section("content12")

<style type="text/css">
th{
	text-align: center;


	font-size: 14px;
}
td{
	font-family: "Times New Roman", Times, serif;
	font-size: 15px;
}

</style>
<section class="content-header" style="">
	<p style="font-size: 17px; color: #1BB2BA; margin-bottom:2px; padding-left: 13px; padding-bottom: 10px; font-weight:bold;">
		NGHIỆM THU NHIỆM VỤ
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

	@if(Session::has('successfile'))
	<div class="alert alert-success">{{Session::get('successfile')}}</div>
	@endif

	<div class="model">
		<div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
			<h5 style="float: left; margin: 10px 10px 10px 10px; color: white; "> <span style="color: #FFB724; font-weight: bold;"><i class="fa fa-check-square" aria-hidden="true"></i>  @if($nhiemvuchuyenmonid->dieuchinh==1)  QUYẾT ĐỊNH PHÊ DUYỆT ĐIỀU CHỈNH NHIỆM VỤ @else  QUYẾT ĐỊNH PHÊ DUYỆT NHIỆM VỤ @endif </span></h5>

			<a title="Đóng" href="{{route('nhiemvuchuyenmonnghiemthu')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-info" > <i class="fa fa-times" aria-hidden="true"></i></a>

			

			<a title="Thêm khối lượng và dự toán" href=""  data-toggle="modal" data-target="#myModal" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-plus" aria-hidden="true"></i></a>


		</div>

		<div class="row" style="width: 95%; background-color: #FAFBFC; padding-top: 20px;padding-bottom: 10px; margin: 0 auto; ">


			<table class="table">
				<?php 
				$coquan=App\coquanpheduyet::find($nhiemvuchuyenmonid->id_coquanpd);
				?>

				<tbody>
					
					<tr>
						<td>Cơ quan phê duyệt</td>
						<td style="width: 80%;"> @if($coquan!=null){{$coquan->tencoquan}} @endif</td>

					</tr>

					<tr>
						<td>Số quyết định</td>
						<td style="width: 80%;">{{$nhiemvuchuyenmonid->soqd}}</td>

					</tr>
					<tr>
						<td>Ngày quyết định</td>
						<td>{{$nhiemvuchuyenmonid->ngayqd}}</td>

					</tr>
					<tr>
						<td>Tên nhiệm vụ</td>
						<td>{{$nhiemvuchuyenmonid->tennv}}</td>
					</tr>
					
					<tr>
						<td>Thời gian thực hiện </td>
						<td>{{$nhiemvuchuyenmonid->thoigianthuchien}}</td>

					</tr>
					<tr>
						<td>Dự toán </td>
						<td>{{$nhiemvuchuyenmonid->tongdutoan}} (VNĐ)</td>

					</tr>
					<tr>
						<td colspan="2">File quyết định phê duyệt nv: <a href="public/tailieu/{{$nhiemvuchuyenmonid->file_quyetdinh}}">file_quyet_dinh.pdf</a> <br> File hồ sơ phê duyệt nv: <a href="public/tailieu/{{$nhiemvuchuyenmonid->file_hosoquyetdinh}}">file_ho_so_nv.pdf</a> <br> File đề cương nv: <a href="public/tailieu/{{$nhiemvuchuyenmonid->file_decuong}}">file_de_cuong.pdf</a>  <br> File thẩm định vn: <a href="public/tailieu/{{$nhiemvuchuyenmonid->file_thamdinh}}">file_thamdinh.pdf</a> 
						<br> File đặt hàng, giao nhiệm: <a href="public/tailieu/{{$nhiemvuchuyenmonid->file_dathang}}">file_dathang.pdf</a> </td>


					</tr>

				</tbody>
			</table>

			<h5 style="font-weight: bold;"> ĐƠN VỊ THỰC HIỆN NHIỆM VỤ</h5>

			<table class="table table-bordered">
				<thead style="background-color:#C9E3FC;">
					<tr>
						<th>Năm thực hiện</th>
						<th>Đơn vị thực hiện</th>
						<th>Số quyết định đặt hàng</th>
						<th>Ngày qd đặt hàng</th>
						<th>Dự toán giao</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($nhiemvu_donvis as $nhiemvu_donvi)
					<?php $phongban=App\phongban::find($nhiemvu_donvi->id_donvi); ?>
					<tr>
						<td>{{$nhiemvu_donvi->namthuchien}}</td>
						<td>{{$phongban->tenphongabn}}</td>
						<td>{{$nhiemvu_donvi->soqd}}  </td>
						<td>{{$nhiemvu_donvi->ngayqd}} </td>
						<td>{{$nhiemvu_donvi->dutoandathang}}</td>
						<td><a href="{{route('chitietnhiemvugiaott',[$nhiemvu_donvi->id])}}">Chi tiết</a> </td>
					</tr>
					@endforeach
					
				</tbody>
			</table>

		</div>

		@if($nhiemvuchuyenmonid->dieuchinh==1) 

		<div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
			<h5 style="float: left; margin: 10px 10px 10px 10px; color: white; "> <span style="color: #FFB724; font-weight: bold;"><i class="fa fa-check-square" aria-hidden="true"></i> THÔNG TIN QUYẾT ĐỊNH NHIỆM VỤ TRƯỚC    </span></h5>

		</div>
		<a  href="{{route('chitietnghiemthu',[$nhiemvuchuyenmonid->id_nv])}}"  type="button" style=" margin-top: 5px; margin-left:27px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-folder-open" aria-hidden="true"></i> Xem tại đây</a>

		@endif
		
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 style="color:blue; font-weight:bold;" class="modal-title">THÊM PHỤ LỤC KHỐI LƯỢNG VÀ DỰ TOÁN KÈM THEO </h4>
			</div>
			<div class="modal-body">

				<form action="{{route('importphuluctt',[$nhiemvuchuyenmonid->id])}}" method="POST" enctype="multipart/form-data">
					<input type="hidden"  name="_token" value="{{csrf_token()}}" >


					<div class="form-group">
						<label>Tải lên file excel</label>
						<input type="file" name="select_file">
					</div>

					<button type="submit" class="btn btn-default">Lưu lại</button>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>




	</div>
</div>






@endsection




