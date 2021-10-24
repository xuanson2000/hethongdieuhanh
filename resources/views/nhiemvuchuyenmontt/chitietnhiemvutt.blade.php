@extends('khoangsan1.layout')
@section("content13")

<style type="text/css">
   th{
    text-align: center;
   
  
   font-size: 14px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size:14px;
 }
 
</style>
<section class="content-header" style="">
  <p style="font-size: 17px; color: #1BB2BA; margin-bottom:2px; padding-left: 13px; padding-bottom: 10px; font-weight:bold;">
CHI TIẾT DANH SÁCH NHIỆM VỤ CHUYÊN MÔN ĐẶT HÀNG, GIAO NHIỆM VỤ
  </p>

 <!--  <ol class="breadcrumb">
      <a style="float: right;padding: 5px 10px 5px 10px; margin-bottom: 5px; margin-top: -15px;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
  </ol> -->
</section>



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

  @if(Session::has('successfile'))
  <div class="alert alert-success">{{Session::get('successfile')}}</div>
  @endif

 <div class="model">
  <div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
   <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; "> <span style="color: #FFB724; font-weight: bold;"> NHIỆM VỤ CHUYÊN MÔN ĐẶT HÀNG, GIAO NHIỆM VỤ </span></h4>

   <a title="Đóng" href="{{route('nhiemvutt')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-info" > <i class="fa fa-times" aria-hidden="true"></i></a>
   
  <!--   <a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"   href=""  type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></a> -->

     <!-- <a title="Thêm khối lượng và dự toán" href=""  data-toggle="modal" data-target="#myModal" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-plus" aria-hidden="true"></i></a> -->


  </div>
  <div class="row" style="width: 95%; background-color: #FAFBFC; padding-top: 20px;padding-bottom: 10px; margin: 0 auto; ">


    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="pill" href="#home">THÔNG TIN QUYẾT ĐỊNH ĐẶT HÀNG, GIAO NHIỆM VỤ</a></li>
      <li><a data-toggle="pill" href="#menu1">PHỤ LỤC HẠNG MỤC CÔNG VIỆC</a></li>

    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
       

    <?php 
    $nhiemvuchuyenmon=App\nhiemvuchuyenmon::find($nhiemvu_donvithuchien->id_nhiemvu);

     ?>
 

     <table class="table" style="margin-top:10px;">

      <tbody>
        <tr>
          <td>Số quyết định</td>
          <td style="width: 70%;">{{$nhiemvu_donvithuchien->soqd}}</td>

        </tr>
        <tr>
          <td>Ngày quyết định</td>
          <td >{{$nhiemvu_donvithuchien->ngayqd}}</td>

        </tr>
        <tr>
          <td>Tên danh mục dịch vụ sự nghiệp </td>
          <td> {{$nhiemvuchuyenmon->tennv}}</td>
        </tr>


        <tr>
          <td>Năm thực hiện </td>
          <td>{{$nhiemvu_donvithuchien->namthuchien}}</td>

        </tr>
        <tr>
          <td>Dự toán </td>
          <td>{{$nhiemvu_donvithuchien->dutoandathang}}</td>

        </tr>
        <tr>
          <td >File quyết định đặt hàng: 
          </td>
          <td>
            <a href="public/tailieu/{{$nhiemvu_donvithuchien->file}}">file_quyetdinh_dat_hang</a> 
          </td>
        </tr>

      

      </tbody>
    </table>
    <p style="font-weight:bold; margin-left:5px;"> HỒ SƠ NHIỆM VỤ</p>


     <table class="table" style="margin-top:10px;">

      <tbody>
  

        <tr>
          <td style="width: 30%;">Quyết định phê quyệt nhiệm vụ:  </td>
          <td>
            <a href="public/tailieu/{{$nhiemvuchuyenmon->file_quyetdinh}}">file_quyetdinh_pdnv</a>
          </td>
        </tr>

        <tr>
          <td>Hồ sơ phê quyệt nhiệm vụ:  </td>
          <td>
            <a href="public/tailieu/{{$nhiemvuchuyenmon->file_hosoquyetdinh}}">file_hoso_pdnv</a>
          </td>
        </tr>

        <tr>
          <td>Hồ sơ thẩm định nhiệm vụ:  </td>
          <td>
            <a href="public/tailieu/{{$nhiemvuchuyenmon->file_thamdinh}}">file_hoso_tdnv</a>
          </td>
        </tr>

        <tr>
          <td>Đề cương nhiệm vụ:  </td>
          <td>
            <a href="public/tailieu/{{$nhiemvuchuyenmon->file_decuong}}">file_decuong_vn</a>
          </td>
        </tr>







      </tbody>
    </table>

      </div>
      <div id="menu1" class="tab-pane fade">
        <?php 
        $phuluckhoiluongtts=App\phuluckhoiluongtt::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->orderBy('id', 'ASC')->get();

        ?>

        <table class="table table-bordered" style="margin-top:10px;">
          <thead style="background-color:#9CD1F5;">
            <tr>
              <th>STT</th>
              <th>Nội dung</th>
              <th>Đơn vị tính</th>
              <th>Khối lượng</th>
              <th>Đơn giá</th>
              <th>Dự toán phê duyệt</th>
               <th>Chi thường xuyên</th>
                <th>Không thường xuyên</th>
            </tr>
          </thead>
          <tbody>
            @foreach($phuluckhoiluongtts as $phuluckhoiluongtt)
            <tr>
              <td>{{$phuluckhoiluongtt->stt}}</td>
              <td>{{$phuluckhoiluongtt->noidung}}</td>

              <td>{{$phuluckhoiluongtt->dvt}}</td>

              <td>{{$phuluckhoiluongtt->khoiluong}}</td>

              <td>{{$phuluckhoiluongtt->dongia}}</td>

              <td>{{$phuluckhoiluongtt->dutoanpheduyet}}</td>

              <td>{{$phuluckhoiluongtt->chithuongxuyen}}</td>
                <td>{{$phuluckhoiluongtt->khongthuongxuyen}}</td>

              
            </tr>
            @endforeach
         
          </tbody>
        </table>




      </div>

    </div>


  
  </div>
</div>
</div>




  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:blue; font-weight:bold;" class="modal-title">THÊM PHỤ LỤC KHỐI LƯỢNG VÀ DỰ TOÁN KÈM THEO </h4>
        </div>
        <div class="modal-body">
          
          <form action="{{route('importphuluctt',[$nhiemvu_donvithuchien->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
            

            <div class="form-group">
              <label>Tải lên file excel</label>
              <input type="file" name="select_file">
            </div>

            <button type="submit" class="btn btn-default">Lưu lại</button>

          </form>






        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
      
    </div>
  </div>






  @endsection




