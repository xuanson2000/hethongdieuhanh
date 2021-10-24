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
	<div class="row" style=" border-style: groove;">

			<?php 
		$nghiemthucapquanlyid=App\nghiemthucapquanly::find($id_ntql);
		$nhiemvu_donvi=App\nhiemvu_donvithuchien::find($nghiemthucapquanlyid->id_nhiemvu_donvi);
		$phongban=App\phongban::find($nhiemvu_donvi->id_donvi);
		?>

		<form action="{{route('saveformbienbanql',[$id_ntql,$loaint])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >

			<div class="col-md-6" style="margin-top: 20px;">
				<center><p style="font-weight:bold; margin-bottom: -2px;">TRUNG TÂM QUY HOẠCH VÀ ĐIỀU TRA TÀI NGUYÊN NƯỚC QUỐC GIA</p> 
				<p> HỘI ĐỒNG NGHIỆM THU</p> </center>
				
			</div>
			<div class="col-md-6"  style="margin-top: 20px; ">
				<center><p style="font-weight:bold; margin-bottom: -2px;" >CỘNG HÒA XÃ HỘI CHỦ NGĨA VIỆT NAM</p> </center>
				<center><p>Độc lập - Tự do - Hạnh phúc</p> </center>
				
			</div>


			<div class="col-md-12">
				<center><h3>BIÊN BẢN HỘI ĐỒNG NGHIỆM THU NIÊN ĐỘ </h3></center>
					<center><h4> (6 THÁNG @if($loaint==6) ĐẦU NĂM @else  CUỐI NĂM @endif) </h4></center>

				<center>	<p>Đề án: {{$nhiemvu_donvi->noidung}}</p></center>
			<p>{!! $nghiemthucapquanlyid->cancuphaply !!} </p>
				<p style="font-weight:bold;">1. Thành phần nghiệm thu:</p>
				<p>a. hội đồng nghiệm thu:</p>
					<p>{!! $nghiemthucapquanlyid->thanhphannt !!} </p>

						<p>b. Đơn vị (bộ phận) Thực hiện:</p>

				<p>{!! $nghiemthucapquanlyid->bophanthuchien !!} </p>
		   <p style="font-weight:bold;">2. Thời gian thực hiện</p>
			</div>
			<div class="col-md-6">
				<p> Bắt đầu:
					<input type="datetime-local" id="birthdaytime" name="ngabt">

				  </p>
				 

			</div>

				<div class="col-md-6">
					<p> Kết thúc: 
						<input type="datetime-local" id="birthdaytime" name="ngaykt">

					</p>
				 

			</div>

		


				
       
          <div class="col-md-12">
				<p style="font-weight:bold;">3.Khối lượng nghiệm thu</p>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên công việc sản phẩm</th>
							<th>Đơn vị tính</th>
							<th>Khối lượng được duyệt</th>
							<th>Khối lượng thực hiện được</th>
							<th>Khối lượng nghiệm thu</th>
							<!-- <th>Ghi chú</th> -->
						</tr>
					</thead>
					<tbody>
						@foreach($phuluckhoiluongtts as  $phuluckhoiluongtt)
						<tr>
							<td>{{$phuluckhoiluongtt->stt}}</td>
							
							<td>@if($phuluckhoiluongtt->khoiluong!=null) <input style="height:6px;" type="checkbox"  name="example2[]" value="{{$phuluckhoiluongtt->id}}" checked >   @endif    {{$phuluckhoiluongtt->noidung}} </td>
							<td>{{$phuluckhoiluongtt->dvt}}</td>
							<td>{{$phuluckhoiluongtt->khoiluong}}</td>

							<td>@if($phuluckhoiluongtt->khoiluong!=null)  <input type="number"  step="0.01" class="form-control" name="thql[]" />   @endif</td>
							<td>@if($phuluckhoiluongtt->khoiluong!=null)  <input type="number"  step="0.01" class="form-control" name="ntql[]" />   @endif</td>
						
							
						<!-- 	<td>@if($phuluckhoiluongtt->khoiluong!=null)<input type="number" class="form-control" name="namthuchien"  />  @endif</td> -->
						</tr>

						@endforeach
						
					</tbody>
				</table>

				<p style="font-weight:bold;">4. Đánh giá về khối lượng(đã thực hiện hoàn thành .. đạt tỷ lệ  % so với khối lượng được duyệt. Nguyên nhân khôi lượng không được nghiệm thu):</p>

				<textarea class="form-control" name="danhgiakhoiluong" id="ck1" style="height:150px;">
					
				</textarea>
					<script src="public/ckeditor/ckeditor.js"></script>
				<script>
					CKEDITOR.replace('ck1' );
				</script>


				<p style="font-weight:bold;">5. Đánh giá về chất lượng(đã thực hiện hoàn thành .. đạt tỷ lệ  % so với khối lượng được duyệt. Nguyên nhân khôi lượng không được nghiệm thu):</p>

				<textarea class="form-control" name="danhgiachatluong" id="ck2" style="height:150px;">
					
				</textarea>
						<script src="public/ckeditor/ckeditor.js"></script>
				<script>
					CKEDITOR.replace('ck2' );
				</script>


				<p style="font-weight:bold;">6. Kết luận chung (đã thực hiện hoàn thành .. đạt tỷ lệ  % so với khối lượng được duyệt. Nguyên nhân khôi lượng không được nghiệm thu):</p>

				<textarea class="form-control" name="ketluan" id="ck3" style="height:150px;">
					
				</textarea>
						<script src="public/ckeditor/ckeditor.js"></script>
				<script>
					CKEDITOR.replace('ck3' );
				</script>


				<p style="font-weight:bold;">7. Kiến nhị(đã thực hiện hoàn thành .. đạt tỷ lệ  % so với khối lượng được duyệt. Nguyên nhân khôi lượng không được nghiệm thu):</p>

				<textarea class="form-control" name="kiennghi" id="ck4" style="height:150px;">
					
				</textarea>

						<script src="public/ckeditor/ckeditor.js"></script>
				<script>
					CKEDITOR.replace('ck4' );
				</script>
				
			</div>
			<br>

			<div class="form-group" style="">
				<button style="float: right;" type="submit" class=" btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
			</div>


		</form>

	</div>






  

</div>




  



  @endsection




