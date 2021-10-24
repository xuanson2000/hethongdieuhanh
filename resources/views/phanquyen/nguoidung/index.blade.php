
 @extends('khoangsan.layout')

@section("content12")

<style type="text/css">
   th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 16px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 16px;
 }
 
</style>
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
  


  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH TÀI KHOẢN </h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>TÀI KHOẢN ĐĂNG NHẬP </th>
    		<th>HỌ TÊN NHÂN VIÊN </th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>
      
        
     @foreach($nguoidungs as $nguoidung)
        <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$nguoidung->username}}</td>
         <td>{{$nguoidung->namclass}}</td>
       
        
        <td> <a href="{{route('suanguoidung',[$nguoidung->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a> 

         <a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoanguoidung',[$nguoidung->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i> </a>

       </td> 	
      </tr>
      @endforeach
    </tbody>
  </table>

  <a style="float: right;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal" >Thêm mới</a>
</div>


<!-- The Modal -->
  <div class="modal fade" id="myModal" >
    <div class="modal-dialog"style="width:60%;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm mới người dùng</h4>
          
          <div class="row">
            <button style="float: right; margin-right:10px;" type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
          </div>
                   

        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<form action="{{route('themnguoidung')}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >
        		 
        		<div class="form-group">
        			<label>Tài khoản</label>
        			<input class="form-control" name="username"  required="required" />
        		</div>
            <div class="form-group">
              <label>Mật khẩu</label>
              <input class="form-control" name="password" type="password"  />
            </div>


        		<div class="form-group">
        			<label>Tên người dùng</label>
        			<input class="form-control" name="namclass"  />
        		</div>

            <div class="form-group">
              <label>Đơn vị</label>

              <select  class="form-control" name="phongBan"  required >
               <?php $phongban=App\phongban::find(Auth::guard('quantri')->user()->phongBan);  ?>
                <option value="">Chọn đơn vị</option>
                <option value="{{$phongban->id}}">{{$phongban->tenphongabn}}</option>
              </select>

            </div>

              <div class="form-group">
              <label>Ảnh đại diện</label>

                 <input type="file" name="image">


            </div>


<!-- 
        		<div class="form-group">
        			@foreach($vaitros as $vaitro)
        			<label class="col-md-4 form-check-label" for="check1">
        				<input type="checkbox" class="form-check-input" id="check1" name="vaitro[]" value="{{$vaitro ->id}}" >&nbsp &nbsp{{$vaitro ->name}}
        			</label>
        	       @endforeach
        		</div> -->
        		<br>

        		<div class="form-group" style=" margin-bottom: 70px; margin-top: 20px;">
        			<button style="float: right;" type="submit" class=" btn btn-default">Lưu lại</button>
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




