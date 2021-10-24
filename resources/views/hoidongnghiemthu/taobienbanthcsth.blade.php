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
		
		$nhiemvu_donvi=App\nhiemvu_donvithuchien::find($nghiemthucapcosoid->id_nhiemvu_donvi);
		$phongban=App\phongban::find($nhiemvu_donvi->id_donvi);
		//{{route('saveformbienban',[$id_ntcs,$loaint])}}
		?>

		<form action="{{route('savetaobienbanthcs',[$nghiemthucapcosoid->id])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
			<div class="col-md-6" style="margin-top: 20px;">
				<center><p style="font-weight:bold; margin-bottom: -2px;  font-size: 19px;">{{$phongban->tenviethoa}}</p> 
				<p> HỘI ĐỒNG NGHIỆM THU</p> </center>
				
			</div>
			<div class="col-md-6"  style="margin-top: 20px; ">
				<center><p style="font-weight:bold; margin-bottom: -2px; font-size: 19px;" >CỘNG HÒA XÃ HỘI CHỦ NGĨA VIỆT NAM</p> </center>
				<center><p>Độc lập - Tự do - Hạnh phúc</p> </center>
				
			</div>
			<div class="col-md-12">
				<center><h3 style="font-weight:bold">BIÊN BẢN HỘI ĐỒNG NGHIỆM THU NIÊN ĐỘ  </h3></center>
				<center><p>(6 THÁNG @if($nghiemthucapcosoid->loainghiemthu==6) ĐẦU NĂM @else  CUỐI NĂM @endif)</p> </center>
				<center>	<p>Đề án: {{$nhiemvu_donvi->noidung}}</p></center>
				<p>{!! $nghiemthucapcosoid->cancuphaply !!} </p>
				<p style="font-weight:bold;">1. Thành phần nghiệm thu:</p>
				<p>a. hội đồng nghiệm thu:</p>
				<p>{!! $nghiemthucapcosoid->thanhphannt !!} </p>
							<p>b. Đơn vị (bộ phận) Thực hiện:</p>

				<p>{!! $nghiemthucapcosoid->bophanthuchien !!} </p>

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
							@if($nghiemthucapcosoid->loainghiemthu==6)
							<th>Khối lượng thực hiện 6 tháng đầu năm</th>
							<th>Khối lượng nghiệm thu (Đạt)</th>
							<th>Khối lượng nghiệm thu (Không đạt)</th>
							@else
              <th>Khối lượng nghiệm thu 6 tháng đầu năm</th>
							<th>Khối lượng thực hiện 6 cuối  năm</th>
							<th>Khối lượng nghiệm thu (Đạt)</th>
							<th>Khối lượng nghiệm thu (Không đạt)</th>

              @endif
							
							<th>Ghi chú</th>
						</tr>
					</thead>
					<tbody>
						@foreach($phuluckhoiluongtts as  $phuluckhoiluongtt)
						<tr>
							<td>{{$phuluckhoiluongtt->stt}}</td>
							
							<td>@if($phuluckhoiluongtt->khoiluong!=null) <input style="height:6px;" type="checkbox"  name="example2[]" value="{{$phuluckhoiluongtt->id}}" checked >   @endif    {{$phuluckhoiluongtt->noidung}} </td>
							<td>{{$phuluckhoiluongtt->dvt}}</td>
							<td>{{$phuluckhoiluongtt->khoiluong}}</td>

							@if($nghiemthucapcosoid->loainghiemthu==6)

							<td>@if($phuluckhoiluongtt->khoiluong!=null) {{$phuluckhoiluongtt->thcs6t}}    @endif</td>
							<td>@if($phuluckhoiluongtt->khoiluong!=null) {{$phuluckhoiluongtt->ntcs6t}}   @endif</td>

							<td>@if($phuluckhoiluongtt->thcs6t!=null && $phuluckhoiluongtt->ntcs6t !=null ) {{$phuluckhoiluongtt->thcs6t - $phuluckhoiluongtt->ntcs6t}}   @endif</td>

							<td> @if($phuluckhoiluongtt->khoiluong!=null && $phuluckhoiluongtt->ntcs6t !=null  && $phuluckhoiluongtt->khoiluong!=0) {{round(($phuluckhoiluongtt->ntcs6t / $phuluckhoiluongtt->khoiluong)*100)}} %  @endif</td>

							@else
							<td>@if($phuluckhoiluongtt->khoiluong!=null) {{$phuluckhoiluongtt->ntcs6t}}   @endif</td>
							<td>@if($phuluckhoiluongtt->khoiluong!=null) {{$phuluckhoiluongtt->thcs12t}}   @endif</td>
							<td>@if($phuluckhoiluongtt->khoiluong!=null) {{$phuluckhoiluongtt->ntcs12t}}   @endif</td>

						 <td>@if($phuluckhoiluongtt->thcs12t!=null && $phuluckhoiluongtt->ntcs12t !=null ) {{$phuluckhoiluongtt->thcs12t - $phuluckhoiluongtt->ntcs12t}}   @endif
						 </td>
            <td>@if($phuluckhoiluongtt->khoiluong!=null && $phuluckhoiluongtt->ntcs12t !=null && $phuluckhoiluongtt->khoiluong!=0 ) {{ round ((($phuluckhoiluongtt->ntcs12t +$phuluckhoiluongtt->ntcs6t) / $phuluckhoiluongtt->khoiluong)*100)}} %   @endif</td>
							@endif
					
							
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

				<p style="font-weight:bold;">8. File bảng tổng hợp khối lượng, giá trị nghiệm thu:</p>
				  <input type="file" name="filethkqnt">
			</div>

			<br>

			<div class="form-group" style="">
				<button style="float: right;" type="submit" class=" btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
			</div>


		</form>

	</div>






  

</div>




  



  @endsection




