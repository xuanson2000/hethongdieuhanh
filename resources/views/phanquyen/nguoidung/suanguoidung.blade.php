
@extends('khoangsan.layout')
@section("content12")

<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 15px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 16px;
 }
 
</style>

<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  <h4>CẬP NHẬT NGƯỜI DÙNG </h4> 

<!-- The Modal  -->

        <!-- Modal body -->
        <div class="row modal-body" style="width: 60%;" >
  
          <form action="{{route('suanguoidungpost',[$nguoidung->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
             
        	<div class="form-group">
        			<label>Tên tài khoản</label>
        			<input class="form-control" name="username"  required="required" value="{{$nguoidung->username}}" />
        		</div>
         


        		<div class="form-group">
        			<label>Tên người dùng</label>
        			<input class="form-control" name="namclass" value="{{$nguoidung->namclass}}"  />
        		</div>


        		<div class="form-group">
        			<label>Ảnh đại diện</label>
        			<br>
        			<img style="width:100px;" src="public/anh/{{$nguoidung->anh}}">
        			<input type="file" name="image">

        		</div>



     
        		<br>

            <button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
             
          </form>

        </div>
        
      
       </div> 
    
  
 

  @endsection