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
  

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold; color: red;"><i class="fa fa-bell-o" aria-hidden="true"></i>THÔNG BÁO</h5>
      </div>
      <div class="modal-body">

      	@if($diem >0)

      	<h4> Bạn đang là thành viện của {{$diem}} hội đồng nghiệm thu  </h4>
        @else
        <h4> Bạn không có thông báo nào </h4>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
       
      </div>
    </div>
  </div>
</div>



<script>
	$('#exampleModal').modal({
  show: true
})

</script>


@if(Session::has('messgsua'))
	<div class="alert alert-success">{{Session::get('messgsua')}}</div>
	@endif

	@if(Session::has('messgthem'))
	<div class="alert alert-success">{{Session::get('messgthem')}}</div>
	@endif

    @if(Session::has('messgxoa'))
  <div class="alert alert-success">{{Session::get('messgxoa')}}</div>
  @endif

  @if(count($nghiemthucapquanly_chuyengias)>0)


  <h5 style="font-weight:bold;"> Nghiệm thu cấp quản lý</h5>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>Số quyết định</th>
        <th>Ngày quyết định</th>
        <th>Nội dung</th>
        <th>Đơn vị thực hiện</th>
         <th>Loại nghiệm thu</th>
         <th>Chi tiết</th>

      </tr>
    </thead>
    <tbody>
    	@foreach($nghiemthucapquanly_chuyengias as $nghiemthucapquanly_chuyengia)
    	<?php  
    	$nghiemthucapquanlyid=App\nghiemthucapquanly::find($nghiemthucapquanly_chuyengia->id_ntql);
    	$nhiemvu_donvithuchienid=App\nhiemvu_donvithuchien::find($nghiemthucapquanlyid->id_nhiemvu_donvi);

    	$donvi=App\phongban::find($nhiemvu_donvithuchienid->id_donvi);
    	$nhiemvuchuyenmon=App\nhiemvuchuyenmon::find($nhiemvu_donvithuchienid->id_nhiemvu);
    	?>
    	<tr>
    		<td>{{$loop->index+1}}</td> 
    		<td>{{$nhiemvu_donvithuchienid->soqd}}</td>
    		<td>{{$nhiemvu_donvithuchienid->ngayqd}}</td>
    		<td>{{$nhiemvuchuyenmon->tennv}}</td>

    		<td>{{$donvi->tenphongabn}}</td>
    		<td>@if($nghiemthucapquanlyid->loainghiemthu==6) 6 tháng đầu năm @else 6 tháng cuối năm @endif  </td>
    		<td><a href="{{route('chitiethoidongnghiemthu',[$nghiemthucapquanly_chuyengia->id])}}">xem</a> </td>
    		
    	</tr>
    	@endforeach

    </tbody>
  </table>
@endif

  @if(count($nghiemthucoso_chuyengias)>0)


    <h5 style="font-weight:bold;"> Nghiệm thu cấp cơ sở</h5>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>Số quyết định</th>
        <th>Ngày quyết định</th>
        <th>Nội dung</th>
        <th>Đơn vị thực hiện</th>
         <th>Loại nghiệm thu</th>
         <th>Chi tiết</th>

      </tr>
    </thead>
    <tbody>
      @foreach($nghiemthucoso_chuyengias as $nghiemthucoso_chuyengia)
      <?php  
      $nghiemthucapcosoid=App\nghiemthucapcoso::find($nghiemthucoso_chuyengia->id_nvcs);
      $nhiemvu_donvithuchienid=App\nhiemvu_donvithuchien::find($nghiemthucapcosoid->id_nhiemvu_donvi);

      $donvi=App\phongban::find($nhiemvu_donvithuchienid->id_donvi);
      $nhiemvuchuyenmon=App\nhiemvuchuyenmon::find($nhiemvu_donvithuchienid->id_nhiemvu);
      ?>
      <tr>
        <td>{{$loop->index+1}}</td> 
        <td>{{$nhiemvu_donvithuchienid->soqd}}</td>
        <td>{{$nhiemvu_donvithuchienid->ngayqd}}</td>
        <td>{{$nhiemvuchuyenmon->tennv}}</td>

        <td>{{$donvi->tenphongabn}}</td>
        <td>@if($nghiemthucapcosoid->loainghiemthu==6) 6 tháng đầu năm @else 6 tháng cuối năm @endif  </td>
        <td><a href="{{route('chitiethoidongnghiemthucs',[$nghiemthucoso_chuyengia->id])}}">xem</a> </td>
        
      </tr>
      @endforeach

    </tbody>
  </table>


  @endif


  

</div>




  



  @endsection




