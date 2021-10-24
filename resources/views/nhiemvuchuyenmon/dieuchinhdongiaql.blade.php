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
ĐIỀU CHỈNH ĐƠN GIÁ
  </p>

  <ol class="breadcrumb">
  	  
  </ol>
</section>



<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  
	
	<div class="row" style=" border-style: groove;">
	

		<form action="{{route('savedieuchinhdongiaql',[$id_nhiemvu_donvi,$loaint])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
             <div class="col-md-12">
				<p style="font-weight:bold;">ĐIỀU CHỈNH ĐƠN GIÁ</p>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên công việc sản phẩm</th>
							<th>Đơn vị tính</th>
							<th>Đơn giá</th>
							<th>Đơn giá điều chỉnh</th>
							
							
						</tr>
					</thead>
					<tbody>
						@foreach($phuluckhoiluongtts as  $phuluckhoiluongtt)
						<tr>
							<td>{{$phuluckhoiluongtt->stt}}</td>
							
							<td>@if($phuluckhoiluongtt->khoiluong!=null) <input style="height:6px;" type="checkbox"  name="example2[]" value="{{$phuluckhoiluongtt->id}}" checked >   @endif    {{$phuluckhoiluongtt->noidung}} </td>
							<td>{{$phuluckhoiluongtt->dvt}}</td>
							<td>{{$phuluckhoiluongtt->dongia}}</td>

							<td>@if($phuluckhoiluongtt->khoiluong!=null)  <input type="number" step="0.01" class="form-control" name="dongiadc[]" />   @endif</td>
					
						</tr>

						@endforeach
						
					</tbody>
				</table>

				
			</div>


			<br>

			<div class="form-group" style="">
				<button style="float: right;" type="submit" class=" btn btn-default">Lưu lại</button>
			</div>


		</form>

	</div>






  

</div>




  



  @endsection




