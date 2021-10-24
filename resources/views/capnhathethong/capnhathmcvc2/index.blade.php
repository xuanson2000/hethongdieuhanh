
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
  font-size: 16px;
 }
 
</style>
<section class="content-header" style="">
  <p style="font-size: 17px; color: #1BB2BA; margin-bottom:2px; padding-left: 13px; padding-bottom: 10px; font-weight:bold;">
DANH SÁCH HẠNG MỤC CV CẤP 2
  </p>

  <ol class="breadcrumb">
  	  <a style="float: right;padding: 5px 10px 5px 10px; margin-bottom: 5px; margin-top: -15px;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
  </ol>
</section>








<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
   <h4>Cập nhật hạng mục công việc cấp 2</h4>    

   <div class="row" style="margin-left: 1px; margin-right: 1px; margin-bottom: 10px; background-color: #ACB4BF;">

   	<form action="" method="get">
   		<div class="col-md-4 form-group" style="margin-left: 10px; margin-top: 10px;">
   			<label style="font-weight: bold; float:left;">Tên Quận huyện</label>
   			<select class="form-control" name="tenluuvucsong" required>
   				<option value="">Chọn hạng mục công việc c1</option>
   				<option value="0">Tất cả </option>
   			</select>
   		</div>
   		
   		<div class="col-md-2" style="">
   			<button style="margin-top:35px;" type="submit" class="btn btn-primary">Tra cứu</button>
   		</div>
   	</form>


   </div>


  @if(Session::has('messgsua'))
  <div class="alert alert-success alert-dismissible" style="background-color: #C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgsua')}}
  </div>
  @endif

  @if(Session::has('messgthem'))
  <div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgthem')}}
  </div>
  @endif

  @if(Session::has('messgxoa'))

  <div class="alert alert-success">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('messgxoa')}}</div>
  @endif



  @if(isset($songnhos) )

  <table class="table table-bordered">
    <thead>
     <tr>
      <th>STT</th>
      <th>TÊN SÔNG CẤP 2</th>
      <th>LƯU VỰC SÔNG</th>
      <th>THAO TÁC</th>
    </tr>
  </thead>

  <tbody>

   @foreach($songnhos as $dssong)
   <tr>
    <td style="text-align: center;">{{$loop->index+1}}</td>
    <td>{{$dssong->tensong}}</td>
    <?php $tenlvs=DB::table('luuvucsong')->find($dssong->id_luuvucsong); ?>
    <td>   @if($tenlvs !=null) {{$tenlvs->tenlucvucsong}} @endif</td>
    <td style="text-align: center;"> 

    	<a title="Sửa" href="{{route('suadulieudongsong',[$dssong->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i> </a>

     <a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
   </td>
 </tr>
 @endforeach

</tbody>
</table>

  {!! $songnhos->appends(Request::all())->links() !!}

   @else

   <table class="table table-bordered">
   	<thead>
   		<tr>
   			<th>STT</th>
   			<th>TÊN HM CÔNG VIỆC C2</th>
   			<th>THUỘC HẠNG MỤC C1</th>
   			<th>THAO TÁC</th>
   		</tr>
   	</thead>

   	<tbody>

   		@foreach($hmcv_cap2s as $hmcv_cap2)
   		<tr>
   			<td style="text-align: center;">{{$loop->index+1}}</td>
   			<td>{{$hmcv_cap2->tenhmcv}}</td>
   			<?php $tenhmcv1=DB::table('hmcv_theolinhvuc')->find($hmcv_cap2->id_hmcv_c1); ?>
   			<td>   @if($tenhmcv1 !=null) {{$tenhmcv1->tenhmcv}} @endif</td>
   			<td style="text-align: center;"> 
   				<a title="Sửa" href=""><i class="fa fa-pencil" aria-hidden="true"></i> </a>
   				
   				<a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoahmcvc2',[$hmcv_cap2->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
   			</td>
   		</tr>
   		@endforeach

   	</tbody>
   </table>
   {{ $hmcv_cap2s->links()}}


@endif

  
</div>



<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="" style="background-color: #4F78F4; height: 40px;">
         <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm dòng sông</h4>
          <button type="button" style="float: right; margin: 5px 5px 5px 0px; " class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        	<form action="{{route('themhmcvc2')}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >

        		<div class=" form-group" style="">
        			<label style="font-weight: bold; float:left;">Hạng mục cv cấp 1 <span style="color: red;">(*)</span></label>
        			<select class="form-control" name="id_hmcv_c1" required>
        				<option value="">Chọn hmcv c1</option>
        				@foreach($hmcv_theolinhvucs as $hmcv_theolinhvuc)
        				<option value="{{$hmcv_theolinhvuc->id}}">{{$hmcv_theolinhvuc->tenhmcv}}</option>
        				@endforeach
        			</select>
        		</div>

        		<div class="form-group">
        			<label for="usr">Tên hạng mục cv cấp 2<span style="color: red;">(*)</span></label>
        			<input type="text" class="form-control" name="tenhmcv" required="">
        		</div>
        		<button style="float: right;"  type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
        	</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
    
        </div>
        
      </div>
    </div>
  </div>

  @endsection