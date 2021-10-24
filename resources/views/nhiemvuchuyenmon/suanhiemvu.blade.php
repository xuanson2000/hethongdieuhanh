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
<section class="content-header" style="">
  <p style="font-size: 17px; color: #1BB2BA; margin-bottom:2px; padding-left: 13px; padding-bottom: 10px; font-weight:bold;">
ĐẶT HÀNG NHIỆM VỤ CHUYÊN MÔN
  </p>

  <ol class="breadcrumb">
  	  <a style="float: right;padding: 5px 10px 5px 10px; margin-bottom: 5px; margin-top: -15px;" class="btn btn-danger" role="button" href="{{route('nhiemvuchuyenmuon')}}" ><i class="fa fa-times" aria-hidden="true"></i></a>
  </ol>
</section>



<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

	    <div class="modal-body">
        	<form action="{{route('suanhiemvupost',[$nhiemvuchuyenmonedit->id])}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >


            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số quyết định</label>
                  <input class="form-control" name="soqd"  value="{{$nhiemvuchuyenmonedit->soqd}}" required="required" />
                </div>
              </div>
                 <div class="col-md-4">
                <div class="form-group">
                  <label>Ngày quyết định</label>
                  <input type="date" class="form-control" value="{{$nhiemvuchuyenmonedit->ngayqd}}" name="ngayqd"  required="required" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nội dung</label>
                  <input class="form-control" name="tennv" value="{{$nhiemvuchuyenmonedit->tennv}}"  required="required" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Mục tiêu nhiệm vụ</label>
                  <input class="form-control" name="muctieu"value="{{$nhiemvuchuyenmonedit->muctieu}}"   required="required" />
                </div>
              </div>

         

              <div class="col-md-4">
                <div class="form-group">
                  <label>Thời gian thực hiện</label>
                  <input class="form-control" name="thoigianthuchien" value="{{$nhiemvuchuyenmonedit->thoigianthuchien}}"  required="required" />
                </div>
              </div>

              <div class="col-md-8">
                <div class="form-group">
                  <label>Tổng dự toán (VNĐ)</label>
                  <input class="form-control" name="tongdutoan"value="{{$nhiemvuchuyenmonedit->tongdutoan}}"   required="required" />
                </div>
              </div>


            </div>

            <div class="row">
              <h5 style="margin-left:15px; font-weight:bold;">File đính kèm</h5>

            

               <div class="col-md-4">
                <div class="form-group">
                  <label>Quyết định phê duyệt nhiệm vụ</label>
                  <input type="file" name="file_quyetdinh">
                </div>
              </div>

               <div class="col-md-4">
                <div class="form-group">
                  <label>Hồ sơ phê duyệt nhiệm vụ </label>
                  <input type="file" name="file_hosoquyetdinh">
                </div>
              </div>

               <div class="col-md-4">
                <div class="form-group">
                  <label>Hồ sơ thẩm định nhiệm vụ</label>
                  <input type="file" name="file_thamdinh">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Đề cương nhiệm vụ</label>
                  <input type="file" name="file_decuong">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Kế hoạch đặt hàng giao nhiệm vụ</label>
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
 


</div>





  



  @endsection




