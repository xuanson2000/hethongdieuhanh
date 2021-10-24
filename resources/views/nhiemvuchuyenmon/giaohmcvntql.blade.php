@extends('khoangsan.layout')
@section("content12")

<style type="text/css">
   th{
    text-align: center;
    background-color: #82B5E5;
    color: white;
   font-size:14px;
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
  

 	 <div class="modal-body">
        	<form action="{{route('savegiaohmcvntql',[$loaint,$id_chuyengia,$id_nhiemvu_donvi])}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >

        		
        		<table class="table table-bordered">
        			<thead>
        				<tr>
        					<th>Choose</th>
        					<th>STT</th>
        					<th>Nội dung</th>
        					<th>Đơn vị tính</th>
        					<th>Khối lượng</th>
        					<th>Đơn giá</th>
        					
        				</tr>
        			</thead>
        			<tbody>
        				@foreach($phuluckhoiluongtts as $phuluckhoiluongtt)
        				<tr>
        					<td> <input type="checkbox"  name="example2[]" value="{{$phuluckhoiluongtt->id}}"> </td>
        					<td >{{$phuluckhoiluongtt->stt}}</td>
        					@if($phuluckhoiluongtt->khoiluong==null)
        					<td style="font-weight:bold;">{{$phuluckhoiluongtt->noidung}}</td>
        					@else

        					<td>{{$phuluckhoiluongtt->noidung}}</td>

        					@endif

        					<td>{{$phuluckhoiluongtt->dvt}}</td>
        					<td>{{$phuluckhoiluongtt->khoiluong}}</td>
        					<td>{{$phuluckhoiluongtt->dongia}}</td>
        					
        					
        				</tr>
        				@endforeach
        			</tbody>
        		</table>

           
        		

        		<div class="form-group" style="">
        			<button style="float: right;" type="submit" class=" btn btn-default">Giao việc</button>
        		</div>
        		

        		</form>
    
        </div>


</div>





  



  @endsection




