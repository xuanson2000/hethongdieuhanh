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
DANH SÁCH NHIỆM VỤ CHUYÊN MÔN
  </p>

  <ol class="breadcrumb">
  	  <a style="float: right;padding: 5px 10px 5px 10px; margin-bottom: 5px; margin-top: -15px;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
  </ol>
</section>



<div class="container" style="background-color: white; padding: 20px 10px 20px 10px; width: 100%;">
  

	@if(Session::has('messgsua'))
	<div class="alert alert-success">{{Session::get('messgsua')}}</div>
	@endif

	@if(Session::has('messgthem'))
	<div class="alert alert-success">{{Session::get('messgthem')}}</div>
	@endif

    @if(Session::has('messgxoa'))
  <div class="alert alert-success">{{Session::get('messgxoa')}}</div>
  @endif
  


              
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số QĐ </th>
    		<th>Ngày QĐ</th>
    		<th>Tên nhiệm vụ</th>
    		<th>Mục tiêu</th>
    	<!-- 	<th>Phạm vi thực hiện</th> -->
    		<th>TG thực hiện</th>
    		<th>Tổng dự toán (VNĐ)</th>
        <th>Lần điều chỉnh</th>

    		<th>Thao tác</th>
    	</tr>
    </thead>
    <tbody>
      @foreach($nhiemvuchuyenmons as $nhiemvuchuyenmon)
      <tr>
          <td>{{$loop->index+1}}</td>
      <td>{{$nhiemvuchuyenmon->soqd}}</td>
      <td>{{$nhiemvuchuyenmon->ngayqd}}</td>
      <td>{{$nhiemvuchuyenmon->tennv}}</td>
      <td>{{$nhiemvuchuyenmon->muctieu}}</td>
     
      <td>{{$nhiemvuchuyenmon->thoigianthuchien}}</td>
      <td>{{$nhiemvuchuyenmon->tongdutoan}}</td>
      <td>{{$nhiemvuchuyenmon->landieuchinh}}</td>

      <td>
       <a title="Đặt hàng /giao nhiệm vụ" href="{{route('dathang',[$nhiemvuchuyenmon->id])}}"><i class="fa fa-cubes" aria-hidden="true"></i>
       </a>&nbsp;

       <a title="Điều chỉnh nhiệm vụ" href="{{route('dieuchinhnhiemvu',[$nhiemvuchuyenmon->id])}}"><i class="fa fa-cogs" aria-hidden="true"></i>
       </a>&nbsp;

       <a title="Xem chi tiết" href="{{route('chitietnhiemvu',[$nhiemvuchuyenmon->id])}}"><i class="fa fa-folder-open" aria-hidden="true"></i>
       </a>


       

     </td>

      </tr>
@endforeach
    
    
     
    </tbody>
  </table>


</div>


<!-- The Modal -->
  <div class="modal fade" id="myModal" >
    <div class="modal-dialog"style="width:60%;">
      <div class="modal-content">
      
        <!-- Modal Header -->
         <div class="" style="background-color: #4F78F4; height: 40px;">
           <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-family: Helvetica;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Thêm mới nhiệm vụ</h4>
           <button type="button" style="float: right; margin: 5px 5px 5px 0px; " class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<form action="{{route('themnhiemvuchuyenmon')}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số quyết định</label>
                  <input class="form-control" name="soqd"  required="required" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ngày quyết định</label>
                  <input type="date" class="form-control" name="ngayqd"  required="required" />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Cơ quan phê duyệt</label>
                  <select class="form-control" name="id_coquanpd">
                    <option value="">Chọn cơ quan phê duyệt</option>
                    @foreach($coquanpheduyets as $coquanpheduyet)
                    <option value="{{$coquanpheduyet->id}}">{{$coquanpheduyet->tencoquan}}</option>
                    @endforeach
                  </select>
                </div>
              </div>



              <div class="col-md-12">
                <div class="form-group">
                  <label>Tên nhiệm vụ</label>
                  <input class="form-control" name="tennv"  required="required" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Mục tiêu nhiệm vụ</label>
                  <input class="form-control" name="muctieu"  required="required" />
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Phạm vi thực hiện</label>
                  <input class="form-control" name="username"  required="required" />
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group">
                  <label>Thời gian thực hiện</label>
                  <input class="form-control" name="thoigianthuchien"  required="required" />
                </div>
              </div>

              <div class="col-md-8">
                <div class="form-group">
                  <label>Tổng dự toán (VNĐ)</label>
                  <input class="form-control" name="tongdutoan"  required="required" />
                </div>
              </div>

      

            </div>

            <div class="row">
              <h5 style="margin-left:15px; font-weight:bold;">File đính kèm</h5>
              <div class="col-md-6">

                <div class="form-group">
                  <label>Hồ sơ phê duyệt nhiệm vụ </label>
                  <input type="file" name="file_hosoquyetdinh">
                </div>

                  <div class="form-group">
                    <label>Hồ sơ thẩm định nhiệm vụ</label>
                    <input type="file" name="file_thamdinh">
                  </div>

                  <div class="form-group">
                    <label>Quyết định phê duyệt nhiệm vụ</label>
                    <input type="file" name="file_quyetdinh">
                  </div>

                  <div class="form-group">
                    <label>Đề cương nhiệm vụ</label>
                    <input type="file" name="file_decuong">
                  </div>
              
             
                

              </div>
              <div class="col-md-6">
               <div class="form-group">
                <label>Quyết định phê duyệt kế hoạch NV</label>
                <input type="file" name="file_quyetdinhpdkhthvn">
              </div>

               <div class="form-group">
                <label>Quyết định đặt hàng giao nhiệm vụ</label>
                <input type="file" name="file_dathang">
              </div>

              </div>

            

            </div>

        



        	
        		<br>

        		<div class="form-group" style="">
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




