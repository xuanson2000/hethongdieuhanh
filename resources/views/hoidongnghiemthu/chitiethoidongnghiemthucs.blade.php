@extends('khoangsan.layout')
@section("content12")

<style type="text/css">
th{
	text-align: center;


	font-size: 13px;
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
		<div class="row" style="background-color: #4276BB; width: 100%; margin: 0 auto;">
			<h4 style="float: left; margin: 10px 10px 10px 10px; color: white; "> <span style="color: #FFB724; font-weight: bold;">  Lập biên bản nghiệm thu </span></h4>

			<a title="Đóng" href="{{route('nhiemvutt')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-info" > <i class="fa fa-times" aria-hidden="true"></i>
			</a>

		


		</div>

		<div class="row" style="width: 100%; background-color: #FAFBFC; padding-top: 20px;padding-bottom: 10px; margin: 0 auto; ">

			<?php  

    	$nghiemthucapcosoid=App\nghiemthucapcoso::find($nghiemthucoso_chuyengia->id_nvcs);
    	$nhiemvu_donvithuchienid=App\nhiemvu_donvithuchien::find($nghiemthucapcosoid->id_nhiemvu_donvi);

    	$donvi=App\phongban::find($nhiemvu_donvithuchienid->id_donvi);
    	$nhiemvuchuyenmon=App\nhiemvuchuyenmon::find($nhiemvu_donvithuchienid->id_nhiemvu);

    	if($nghiemthucapcosoid->loainghiemthu==6){
    		$phuluckhoiluongtts=App\phuluckhoiluongtt::where('id_nhiemvu_donvi',$nhiemvu_donvithuchienid->id)->where('id_chuyengiacs6t',[Auth::guard('quantri')->user()->id])->orderBy('id','ASC')->get();

    	}else{

    		$phuluckhoiluongtts=App\phuluckhoiluongtt::where('id_nhiemvu_donvi',$nhiemvu_donvithuchienid->id)->where('id_chuyengiacs12t',[Auth::guard('quantri')->user()->id])->orderBy('id','ASC')->get();
    	}

    

    	?>


    	<h5 style="font-weight:bold;"> <i class="fa fa-check-square-o" aria-hidden="true"></i> THÔNG TIN QUYẾT ĐỊNH NHIỆM VỤ</h5>
    	<table class="table table-bordered">
    		<thead >
    			<tr style="background-color: #C9E3FC;">
    				<th>STT</th>
    				<th>Số QĐ</th>
    				<th>Ngày QĐ</th>
    				<th>Nội dung</th>
    				<th> Thời gian thực hiện</th>
    				<th>File quyết định</th>
    				<th>File đề cương</th>
    				<th>File hồ sơ quyết định</th>
    				<th>File hồ sơ thẩm định</th>

    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>1</td>
    				<td>{{$nhiemvuchuyenmon->soqd}}</td>
    				<td>{{$nhiemvuchuyenmon->ngayqd}}</td>
    				<td>{{$nhiemvuchuyenmon->tennv}}</td>
    				<td>{{$nhiemvuchuyenmon->thoigianthuchien}}</td>
    				<td> <a href="public/tailieu/{{$nhiemvuchuyenmon->file_quyetdinh}}">file_quyetdinh.pdf </a> </td>
    				<td> <a href="public/tailieu/{{$nhiemvuchuyenmon->file_decuong}}">file_quyetdinh.pdf </a> </td>
    				<td> <a href="public/tailieu/{{$nhiemvuchuyenmon->file_hosoquyetdinh}}">file_quyetdinh.pdf </a> </td>
    				<td><a href="public/tailieu/{{$nhiemvuchuyenmon->file_thamdinh}} ">file_quyetdinh.pdf </a> </td>

    				
    			</tr>
    			
    		</tbody>
    	</table>




		<h5 style="font-weight:bold;"> <i class="fa fa-check-square-o" aria-hidden="true"></i> THÔNG TIN QUYẾT ĐỊNH ĐẶT HÀNG/ GIAO NHIỆM VỤ</h5>

		<table class="table table-bordered">
    		<thead>
    			<tr style="background-color: #C9E3FC;">
    				<th>STT</th>
    				<th>Số quyết định</th>
    				<th>Ngày quyết định</th>
    				<th>Nội dung</th>
    				<th> Năm thực hiện</th>
    				<th>File quyết định</th>
    				

    			</tr>
    		</thead>
    		<tbody>
    			<tr >
    				<td>1</td>
    				<td>{{$nhiemvu_donvithuchienid->soqd}}</td>
    				<td>{{$nhiemvu_donvithuchienid->ngayqd}}</td>
    				<td>{{$nhiemvuchuyenmon->tennv}}</td>
    				<td>{{$nhiemvu_donvithuchienid->namthuchien}}</td>
    				<td> <a href="public/tailieu/{{$nhiemvu_donvithuchienid->file}}">file_quyetdinh.pdf </a> </td>
    				

    				
    			</tr>
    			
    		</tbody>
    	</table>

   



    	<h5 style="font-weight: bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i> KẾT QUẢ NGHIỆM THU</h5>

    	<table class="table table-bordered">
    		<thead>
    			<tr>
    				<th >Biên bản nghiệm thu  </th>
    				<th style="width: 80%; ">
                      

                      <a title="Gửi biên bản nghiệm thu" href=" {{route('taoformbienbancs',[$nhiemvu_donvithuchienid->id,$nghiemthucapcosoid->loainghiemthu,$nghiemthucapcosoid->id])}}" style="float:right;"> <i class="fa fa-plus-square" aria-hidden="true"></i> Tạo biên bản nghiệm thu</a>

                      <!-- <a style="float:right; color: #FFA303; margin-right: 10px;"  title="Mẫu biên bản nghiệm thu đầu năm" href="public/anh/bienbanngiemthucs6.docx"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>

                      <a  style="float:right; color:#24C41C; margin-right: 10px;" title="Mẫu biên bản nghiệm thu cuối năm" href="public/anh/bienbanngiemthucs12.docx"><i class="fa fa-cloud-download" aria-hidden="true"></i></a> -->
    					
    				</th>
    				
    			</tr>
    		</thead>
    	
    	</table>






		</div>
	</div>
</div>



<!-- The Modal -->
<div class="modal fade" id="myModal" >
	<div class="modal-dialog"style="width:60%;">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="" style="background-color: #4F78F4; height: 40px;">
				<h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-family: Helvetica;"><i class="fa fa-star-half" aria-hidden="true"></i> Gửi biên bản nghiệm thu</h4>
				<button type="button" style="float: right; margin: 5px 5px 5px 0px; " class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="{{route('guibienbannghiemthucoso',[$nghiemthucoso_chuyengia->id])}}" method="POST" enctype="multipart/form-data">
					<input type="hidden"  name="_token" value="{{csrf_token()}}" >

					<div class="col-md-12">
						<div class="form-group">
							<label>Biên bản nghiệm thu</label>
							<input type="file" class="form-control" name="bienban"  required="required" />
						</div>
					</div>
					<div class="form-group" style="">
						<button style="float: right;" type="submit" class=" btn btn-default">Gửi đi</button>
					</div>


				</form>

			</div>

			<!-- Modal footer -->
			<div class="modal-footer">

			</div>


		</div>
	</div>
</div>













@endsection




