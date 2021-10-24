
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
  


  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH QUYỀN QUẢN TRỊ</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>TÊN VAI TRÒ </th>
    		<th>GHI CHÚ</th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>
      
        
     @foreach($vaitros as $vaitro)
        <tr>
        <td>{{$loop->index+1}}</td>

      
          <td>{{$vaitro->name}}</td>
        <td></td>
        
        <td> <a href=""> <img  alt="Sửa" src="public/anh/b_edit.png"></a> 

         <a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoavaitro',[$vaitro->id])}}"><img alt="Xóa" src="public/anh/b_drop.png"></a></td> 	
      </tr>
      @endforeach
    </tbody>
  </table>

  <a style="float: right;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal" >Thêm mới</a>
</div>


<!-- The Modal -->
  <div class="modal fade" id="myModal" >
    <div class="modal-dialog"style="width: 80%;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm mới quyền</h4>
          
          
          <button style="float: right;" type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        

        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<form action="{{route('themvaitro')}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >
        		 
        		
                 
        	


        		<div class="form-group">
        			<label>Tên quyền</label>
        			<input class="form-control" name="name"  />
        		</div>

        		<div class="form-group">
        			@foreach($quyens as $quyen)
        			<label class="col-md-4 form-check-label" for="check1">
        				<input type="checkbox" class="form-check-input" id="check1" name="quyen[]" value="{{$quyen ->id}}" >&nbsp &nbsp{{$quyen ->name}}
        			</label>
        	       @endforeach
        		</div>
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


