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
        	<form action="{{route('savedieuchinhnhiemvudonvi',[$nhiemvu_donvithuchienid->id])}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >

        <div class="col-md-6">
              <div class="form-group">
                <label for="usr">Đơn vị thực hiện<span style="color: red;">(*)</span></label>
                <select class="form-control" name="id_donvi" id="donvi" required>
                 
                
                  <option value="{{$phongbans->id}}">{{$phongbans->tenphongabn}} </option>
              

                </select>
              </div>

           </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="usr">Năm thưc hiện<span style="color: red;">(*)</span></label>
                  <input type="number" class="form-control" name="namthuchien" value="{{$nhiemvu_donvithuchienid->namthuchien}}"  required="required" />
               
              </div>

            </div>
               <div class="col-md-6">
              <div class="form-group">
                <label for="usr">Số quyết định đặt hàng/giao nhiệm vụ<span style="color: red;">(*)</span></label>
                  <input type="text" class="form-control" name="soqd"  required="required" />
               
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="usr">Ngày quyết định đặt hàng/giao nhiệm vụ<span style="color: red;">(*)</span></label>
                <input type="date" class="form-control" name="ngayqd"  required="required" />
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label>Nội dung quyết định đặt hàng/ giao nhiệm vụ</label>
                <input type="text" class="form-control" name="noidung"  required="required" />
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label>Dự toán kinh phí đặt hàng</label>
                <input type="number" step="0.001" class="form-control" name="dutoandathang"  required="required" />
              </div>
            </div>



            <div class="col-md-6">
              <div class="form-group">
                <label>Quyết định đặt hàng/ giao nhiệm vụ</label>
                <input type="file" class="form-control" name="file"  required="required" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Phụ lục khối lượng (Tải file mẫu tại đây <a href="{{route('xuatfilehmc',[$nhiemvu_donvithuchienid->id])}}"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>) </label>
                <label style="color:red;">Ghi chú: file tải nên có định dạng xlsx, xls, trong file không được hòa ô, cột nội dung hạng mục cv không được để trống</label>
                <input type="file" class="form-control" name="select_file"  required="" />
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




