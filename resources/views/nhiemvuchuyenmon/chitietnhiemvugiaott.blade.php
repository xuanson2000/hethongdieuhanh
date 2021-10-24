@extends('khoangsan.layout')
@section("content12")

<style type="text/css">
   th{
    text-align: center;
   
  
   font-size: 13px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 14px;
 }
 
</style>
<section class="content-header" style="">
  <p style="font-size: 17px; color: #1BB2BA; margin-bottom:2px; padding-left: 13px; padding-bottom: 10px; font-weight:bold;">
NGHIỆM THU NHIỆM VỤ ĐẶT HÀNG
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

    @if(Session::has('messgguilai'))
  <div class="alert alert-success">{{Session::get('messgguilai')}}</div>
  @endif

  @if(Session::has('successfile'))
  <div class="alert alert-success">{{Session::get('successfile')}}</div>
  @endif



 <div class="model">
  <?php 
  $phongban=App\phongban::find($nhiemvu_donvithuchien->id_donvi);
  ?>
  <div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
   <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; "> <span style="color: #FFB724; font-weight: bold;">  {{$phongban->tenphongabn}}</span></h4>

 <!--   <a title="Đóng" href="" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-info" > <i class="fa fa-times" aria-hidden="true"></i></a> -->

     <a title="Tổ chức nghiệm thu" href=""  data-toggle="modal" data-target="#myModal" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-book" aria-hidden="true"></i> Tổ chức nghiệm thu</a>


  </div>
  <div class="row" style="width: 95%; background-color: #FAFBFC; padding-top: 20px;padding-bottom: 10px; margin: 0 auto; ">


   <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Thông tin quyết định</a></li>
    <li><a data-toggle="tab" href="#menu1">Nghiệm thu 6 tháng đầu năm</a></li>
    <li><a data-toggle="tab" href="#menu2">Nghiệm thu 6 tháng cuối năm</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
         <table class="table">

    <tbody>
      <tr>
        <td>Số quyết định</td>
        <td style="width: 80%;">{{$nhiemvu_donvithuchien->soqd}}</td>
      
      </tr>
      <tr>
        <td>Ngày quyết định</td>
        <td>{{$nhiemvu_donvithuchien->ngayqd}}</td>
     
      </tr>
      <tr>
        <td>Tên nhiệm vụ</td>
        <td>{{$nhiemvu_donvithuchien->soqd}}</td>
      </tr>

    
      <tr>
        <td>Năm thực hiện </td>
        <td>{{$nhiemvu_donvithuchien->namthuchien}}</td>

      </tr>
      <tr>
        <td>Dự toán đặt hàng</td>
        <td>{{$nhiemvu_donvithuchien->dutoandathang}}</td>
        
      </tr>
      <tr>
        <td colspan="2">File quyết định đặt hàng: <a href="public/tailieu/{{$nhiemvu_donvithuchien->file}}">file_quyetdinh_dat_hang.pdf</a> </td>
       
        
      </tr>

    </tbody>
  </table>


    </div>
    <div id="menu1" class="tab-pane fade">
       <?php
  $nghiemthucapquanlys=App\nghiemthucapquanly::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->where('loainghiemthu',6)->get();

   ?>
   <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Đề nghị nghiệm thu cấp quản lý</h5>

   <table class="table">
   
    <tbody>
      <tr>
        <td>Báo cáo tình hình thực hiện </td>
        <td style="width: 75%;"> @if($nhiemvu_donvithuchien->file_bcthth) <a href="public/tailieu/{{$nhiemvu_donvithuchien->file_bcthth}}">baocaotinhhinhthuchien.pdf</a>@endif </td>
      </tr>
      
       <tr>
        <td>Hồ sơ đề nghị nghiệm thu </td>
        <td> @if($nhiemvu_donvithuchien->file_denghinghiemthu) <a href="public/tailieu/{{$nhiemvu_donvithuchien->file_denghinghiemthu}}">denghinghiemthu.pdf</a>@endif </td>
      </tr>
       <tr>
        <td>Kế hoạch nghiệm thu</td>
        <td> @if($nhiemvu_donvithuchien->file_kehoachnghiemthu) <a href="public/tailieu/{{$nhiemvu_donvithuchien->file_kehoachnghiemthu}}">kehoachnghiemthu.pdf</a>@endif </td>
      </tr>
        <tr>
        <td>Hồ sơ nghiệm thu cấp cơ sở</td>
        <td> @if($nhiemvu_donvithuchien->file_ntccs) <a href="public/tailieu/{{$nhiemvu_donvithuchien->file_ntccs}}">hosonghiemthucs.pdf</a>@endif </td>
      </tr>
     
    </tbody>
  </table>



   <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Quyết định thành lập hội đồng nghiệm thu</h5>

  <table class="table table-bordered">
    <thead style="background-color:#C9E3FC;">
      <tr>
        <th>STT</th>
        <th>Số quyết định</th>
         <th>Ngày quyết định</th>
        <th>Nội dung</th>
        <th>File</th>
        <th>Thao tác</th>

      </tr>
    </thead>
    <tbody>
      @foreach($nghiemthucapquanlys as $nghiemthucapquanly)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$nghiemthucapquanly->soqd}} </td>
        <td>{{$nghiemthucapquanly->ngayqd}} </td>
        <td>{{$nghiemthucapquanly->noidung}}</td>
        <td> <a href="public/tailieu/{{$nghiemthucapquanly->file}}">hoidongnghiemthu.pdf</a> </td>
        <td><a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')" href="{{route('xoanghiemthuql',[$nghiemthucapquanly->id])}}" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

      </tr>
      <tr> 
        <?php  $nghiemthucapquanly_chuyengias= App\nghiemthucapquanly_chuyengia::where('id_ntql',$nghiemthucapquanly->id)->get(); ?>

        <td colspan="6">
     
          <?php 

          $phuluckhoiluongtts=App\phuluckhoiluongtt::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->orderBy('id','ASC')->get();

          ?>
          <div class="modal fade" id="thgtntql6t" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tổng hợp khối lượng giá trị nghiệm thu 6 tháng đầu năm</h4>
                </div>
                <div class="modal-body" style="">

                  <table class="table table-bordered">
                    <thead >

                      <tr>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">STT</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">Tên công việc, sản phẩm</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Đơn vị tính</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">Khối lượng được duyệt năm </th>
                        <!-- <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">Khối lượng thực hiện 6 tháng đầu năm</th> -->

                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Khối lượng nghiệm thu 6 tháng đầu năm</th>
                     <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Đơn giá điều chỉnh</th>

                     <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Thành tiền</th>

                        
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">Ghi chú</th>
                      </tr>


                    </thead>
                    <tbody style="height: 352px; overflow: auto;">
                       <?php $b=0; $c=0;?>
                     @foreach($phuluckhoiluongtts as $phuluckhoiluongtt)
                     <?php 
                     if($phuluckhoiluongtt->chithuongxuyen!=0){
                      if($phuluckhoiluongtt->dongiadc6tql!=null){
                        $b=$b+(($phuluckhoiluongtt->dongiadc6tql)*($phuluckhoiluongtt->ntql6t));

                      }else{
                        $b=$b+(($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntql6t));

                      }

                    }

                    if($phuluckhoiluongtt->khongthuongxuyen!=0){

                      if($phuluckhoiluongtt->dongiadc6tql!=null){
                        $c=$c+(($phuluckhoiluongtt->dongiadc6tql)*($phuluckhoiluongtt->ntql6t));

                      }else{
                        $c=$c+(($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntql6t));

                      }

                    }

                    ?>
                     <tr>
                      <td>{{$phuluckhoiluongtt->stt}}</td>
                      <td>{{$phuluckhoiluongtt->noidung}}</td>
                      <td>{{$phuluckhoiluongtt->dvt}}</td>
                      <td>{{$phuluckhoiluongtt->khoiluong}}</td>
                      <!-- <td>{{$phuluckhoiluongtt->thql6t}}</td> -->
                      <td>{{$phuluckhoiluongtt->ntql6t}}</td>
                      <td>{{$phuluckhoiluongtt->dongiadc6tql}}</td>
                      <td>@if($phuluckhoiluongtt->khoiluong!=null)  @if($phuluckhoiluongtt->dongiadc6tql!=null) {{($phuluckhoiluongtt->dongiadc6tql)*($phuluckhoiluongtt->ntql6t)}} @else {{($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntql6t)}} @endif @endif</td>


                      <td> @if($phuluckhoiluongtt->ntql6t!=null && $phuluckhoiluongtt->thql6t !=null)  {{ round((($phuluckhoiluongtt->ntql6t)/($phuluckhoiluongtt->thql6t))*100 )}} % @endif</td>

                    </tr>
                    @endforeach
                  </tbody>
                </table> 
              </div>
              <div class="modal-footer">
                <p style="font-weight:bold;">Tổng giá trị nghiệm thu:{{$b+$c}}  đồng</p>
                <p style="font-weight:bold;">Chi thường xuyên: {{$b}} đồng </p>
                <p style="font-weight:bold;">Không thường xuyên:{{$c}} đồng</p>

              </div>
            </div>
          </div>
        </div>





          <div class="col-md-10">      <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Biên bản nghiệm thu</h5></div>
          <div class="col-md-2">  <button type="button" style="font-size: 12px; float: right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#thgtntql6t"><i class="fa fa-align-justify" aria-hidden="true"></i> TH Giá trị NT</button></div>



          <table class="table">
            <thead style="background-color:#C9E3FC;">
              <tr>
                <th>STT</th>
                <th>Cán bộ nghiệm thu</th>
                <th>Biên bản</th>
                 <th>Biên bản1</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
               @foreach($nghiemthucapquanly_chuyengias as $nghiemthucapquanly_chuyengia)
               <?php $quantri=App\quantri::find($nghiemthucapquanly_chuyengia->id_quantri);  ?>
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$quantri->namclass}}</td>
                <td> @if($nghiemthucapquanly_chuyengia->bienban!=null) <a href="public/tailieu/{{$nghiemthucapquanly_chuyengia->bienban}}"> bienbannghiemthu.pdf</a> @endif</td>
               
                <td>
                  @if($nghiemthucapquanly_chuyengia->trangthai ==1)
                  <a href="{{route('xuatbienbanntql6t',[$nghiemthucapquanly_chuyengia->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> Xem biên bản nghiệm thu </a>
                  @endif

               </td>


                <td> <a href="{{route('giaohmcvntql',[$nghiemthucapquanly_chuyengia->id_quantri,$nghiemthucapquanly->id])}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Giao hạng mục NT</a> &emsp; @if($nghiemthucapquanly_chuyengia->trangthai ==1)  <a href="{{route('guilaibienbanql',[$nghiemthucapquanly_chuyengia->id])}}"> <i class="fa fa-align-justify" aria-hidden="true"></i> Đề nghị gửi lại</a> @endif </td>

              </tr>
                 @endforeach


                 <tr>
                  <td>{{count($nghiemthucapquanly_chuyengias)+1}}</td>
                  <td>Thư ký hội đồng</td>
                  <td></td>
                  <td> <a href="{{route('xuattaobienbanthqlth',[$nghiemthucapquanly->id])}}"> <i class="fa fa-eye" aria-hidden="true"></i> Xem biên bản tổng họp</a>  &emsp;
                     <a href="{{route('downloaddongiaql',[$nhiemvu_donvithuchien->id,$nghiemthucapquanly->loainghiemthu])}}"><i class="fa fa-cloud-download" aria-hidden="true"></i> Phụ lục </a>

                  </td>
                  <td> <a href="{{route('taobienbanthqlth',[$nghiemthucapquanly->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Thêm BBNTTH</a>  &emsp; &emsp;
                  
                   <a style="color:red;" title="điều chỉnh đơn giá" href="{{route('dieuchinhdongiaql',[$nhiemvu_donvithuchien->id,$nghiemthucapquanly->loainghiemthu])}}"> <i class="fa fa-cog" aria-hidden="true"></i> Điều chỉnh đơn giá</a>


                  </td>
                  
                </tr>



            </tbody>
          </table>

    
        </td>
      </tr>
      @endforeach
 
    </tbody>
  </table>

    </div>
    <div id="menu2" class="tab-pane fade">

       
  <?php
  $nghiemthucapquanlys=App\nghiemthucapquanly::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->where('loainghiemthu',12)->get();


   ?>

   <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Đề nghị nghiệm thu cấp quản lý</h5>

   <table class="table">

    <tbody>
      <tr>
        <td>Báo cáo tình hình thực hiện </td>
        <td style="width: 75%;"> @if($nhiemvu_donvithuchien->file_bcthth12) <a href="public/tailieu/{{$nhiemvu_donvithuchien->file_bcthth12}}">baocaotinhhinhthuchien.pdf</a>@endif </td>
      </tr>
      
      <tr>
        <td>Hồ sơ đề nghị nghiệm thu </td>
        <td> @if($nhiemvu_donvithuchien->file_denghinghiemthu12) <a href="public/tailieu/{{$nhiemvu_donvithuchien->file_denghinghiemthu12}}">denghinghiemthu.pdf</a>@endif </td>
      </tr>
      <tr>
        <td>Kế hoạch nghiệm thu</td>
        <td> @if($nhiemvu_donvithuchien->file_kehoachnghiemthu12) <a href="public/tailieu/{{$nhiemvu_donvithuchien->file_kehoachnghiemthu12}}">kehoachnghiemthu.pdf</a>@endif </td>
      </tr>
      <tr>
        <td>Hồ sơ nghiệm thu cấp cơ sở</td>
        <td> @if($nhiemvu_donvithuchien->file_ntccs12) <a href="public/tailieu/{{$nhiemvu_donvithuchien->file_ntccs12}}">hosonghiemthucs.pdf</a>@endif </td>
      </tr>

    </tbody>
  </table>


 <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Quyết định thành lập hội đồng nghiệm thu</h5>
  <table class="table table-bordered">
    <thead style="background-color:#C9E3FC;">
      <tr>
        <th >STT</th>
        <th>Số quyết định</th>
         <th>Ngày quyết định</th>
        <th>Nội dung</th>
        <th>File</th>
         <th>Thao tác</th>

      </tr>
    </thead>
    <tbody>
      @foreach($nghiemthucapquanlys as $nghiemthucapquanly)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$nghiemthucapquanly->soqd}}</td>
          <td> {{$nghiemthucapquanly->ngayqd}} </td>
        <td>{{$nghiemthucapquanly->noidung}}</td>
        <td> <a href="public/tailieu/{{$nghiemthucapquanly->file}}"> hoidongnghiemthu.pdf</a> </td>
         <td><a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')" href="{{route('xoanghiemthuql',[$nghiemthucapquanly->id])}}" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a></td>




      </tr>
      <tr> 
        <?php  $nghiemthucapquanly_chuyengias= App\nghiemthucapquanly_chuyengia::where('id_ntql',$nghiemthucapquanly->id)->get(); ?>

        <td colspan="6">
         <?php 

         $phuluckhoiluongtts=App\phuluckhoiluongtt::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->orderBy('id','ASC')->get();

         ?>



          <div class="modal fade" id="thgtntql12t" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tổng hợp khối lượng giá trị nghiệm thu 6 tháng cuối năm</h4>
                </div>
                <div class="modal-body" style="">

                  <table class="table table-bordered">
                    <thead >

                      <tr>

                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >STT</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Tên công việc, sản phẩm</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Đơn vị tính</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Khối lượng được duyệt năm </th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Khối lượng nhiệm thu 6 tháng đầu năm</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Khối lượng thực hiện 6 cuối năm năm</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Khối lượng nghiệm thu</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Đơn giá điều chỉnh</th>
                      <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Thành tiền</th>
                        <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Ghi chú</th>





                      </tr>

                    </thead>
                    <tbody style="height: 352px; overflow: auto;">
                     <?php $b=0; $c=0;?>
                     @foreach($phuluckhoiluongtts as $phuluckhoiluongtt)
                     <?php 
                     if($phuluckhoiluongtt->chithuongxuyen!=0){
                      if($phuluckhoiluongtt->dongiadc12tql!=null){
                        $b=$b+(($phuluckhoiluongtt->dongiadc12tql)*($phuluckhoiluongtt->ntql12t));

                      }else{
                        $b=$b+(($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntql12t));

                      }

                    }

                    if($phuluckhoiluongtt->khongthuongxuyen!=0){

                      if($phuluckhoiluongtt->dongiadc12tql!=null){
                        $c=$c+(($phuluckhoiluongtt->dongiadc12tql)*($phuluckhoiluongtt->ntql12t));

                      }else{
                        $c=$c+(($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntql12t));

                      }

                    }

                    ?>
                      <td>{{$phuluckhoiluongtt->stt}}</td>
                      <td>{{$phuluckhoiluongtt->noidung}}</td>
                      <td>{{$phuluckhoiluongtt->dvt}}</td>
                      <td>{{$phuluckhoiluongtt->khoiluong}}</td>
                      <td>{{$phuluckhoiluongtt->ntql6t}}</td>
                      <td>{{$phuluckhoiluongtt->thql12t}}</td>
                      <td>{{$phuluckhoiluongtt->ntql12t}}</td>

                      <td>{{$phuluckhoiluongtt->dongiadc12tql}}</td>

                      <td>@if($phuluckhoiluongtt->khoiluong!=null)  @if($phuluckhoiluongtt->dongiadc12tql!=null) {{($phuluckhoiluongtt->dongiadc12tql)*($phuluckhoiluongtt->ntql12t)}} @else {{($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntql12t)}} @endif @endif</td>

                      <td> @if($phuluckhoiluongtt->ntql12t!=null && $phuluckhoiluongtt->thql12t !=null)  {{round((($phuluckhoiluongtt->ntql12t)/($phuluckhoiluongtt->thql12t))*100 )}} % @endif</td>

                    </tr>
                    @endforeach
                  </tbody>
                </table> 
              </div>
              <div class="modal-footer">
                 <p style="font-weight:bold;">Tổng giá trị nghiệm thu:{{$b+$c}}  đồng</p>
                <p style="font-weight:bold;">Chi thường xuyên: {{$b}} đồng </p>
                <p style="font-weight:bold;">Không thường xuyên:{{$c}} đồng</p>

              </div>
            </div>
          </div>
        </div>




          <div class="col-md-10">      <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Biên bản nghiệm thu</h5></div>
          <div class="col-md-2">  <button type="button" style="font-size: 12px; float: right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#thgtntql12t"><i class="fa fa-align-justify" aria-hidden="true"></i> TH Giá trị NT</button></div>


          <table class="table">
            <thead style="background-color:#C9E3FC;">
              <tr>
                <th>STT</th>
                <th>Người gửi</th>
                <th>Biên bản</th>
                 <th>Biên bản1</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>

             @foreach($nghiemthucapquanly_chuyengias as $nghiemthucapquanly_chuyengia)
             <?php $quantri=App\quantri::find($nghiemthucapquanly_chuyengia->id_quantri);  ?>
             <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$quantri->namclass}}</td>
              <td> @if($nghiemthucapquanly_chuyengia->bienban!=null) <a href="public/tailieu/{{$nghiemthucapquanly_chuyengia->bienban}}"> bienbannghiemthu.pdf</a> @endif</td>
              <td>
                @if($nghiemthucapquanly_chuyengia->trangthai==1) 
                <a href="{{route('xuatbienbanntql12t',[$nghiemthucapquanly_chuyengia->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> Xem biên bản</a>
                @endif
              </td>
              <td> <a href="{{route('giaohmcvntql',[$nghiemthucapquanly_chuyengia->id_quantri,$nghiemthucapquanly->id])}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Giao hạng mục NT</a> &emsp; @if($nghiemthucapquanly_chuyengia->trangthai==1)  <a href="{{route('guilaibienbanql',[$nghiemthucapquanly_chuyengia->id])}}"> <i class="fa fa-envelope" aria-hidden="true"></i> Đề nghị gửi lại</a> @endif </td>
            </tr>
            @endforeach


                 <tr>
                  <td>{{count($nghiemthucapquanly_chuyengias)+1}}</td>
                  <td>Thư ký hội đồng</td>
                  <td></td>
                  <td> <a href="{{route('xuattaobienbanthqlth',[$nghiemthucapquanly->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> Xem biên bản tổng hợp </a> 
                    <a href="{{route('downloaddongiaql',[$nhiemvu_donvithuchien->id,$nghiemthucapquanly->loainghiemthu])}}"><i class="fa fa-cloud-download" aria-hidden="true"></i> Phụ lục </a>

                  </td>
                  <td> <a href="{{route('taobienbanthqlth',[$nghiemthucapquanly->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Thêm BBNTTH</a>

                   <a title="điều chỉnh đơn giá" href="{{route('dieuchinhdongiaql',[$nhiemvu_donvithuchien->id,$nghiemthucapquanly->loainghiemthu])}}"> <i class="fa fa-cog" aria-hidden="true"></i> Điều chỉnh đơn giá</a>

                  </td>
                  
                </tr>



            </tbody>
          </table>

    
        </td>
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
          <h4 style="color:blue; font-weight:bold;" class="modal-title">THÀNH LẬP HỘI ĐỒNG NGHIỆM THU</h4>
        </div>
        <div class="modal-body">
          
          <form action="{{route('themnghiemthucapthucapquanly',[$nhiemvu_donvithuchien->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >

            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home1">Quyết định thành lập HĐNT </a></li>
              <li><a data-toggle="tab" href="#menu11">Thông tin biên bản nghiệm thu</a></li>
            </ul>

            <div class="tab-content">
              <div id="home1" class="tab-pane fade in active">

                       <div class="col-md-4">
                <div class="form-group">
                  <label>Loại nghiệm thu</label>
                  <select class="form-control"  name="loainghiemthu" required="">
                      <option value="">Chọn loại hình nghiệm thu</option>
                    <option value="6">6 Tháng đầu năm</option>
                    <option value="12">6 Tháng cuối năm</option>
                  

                  </select>
                </div>
              </div>
            

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
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nội dung</label>
                  <input class="form-control" name="noidung"  required="required" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>File đính kèm</label>
                  <input type="file" class="form-control" name="file"  required="required" />
                </div>
              </div>
           

              <div class="col-md-12">
                <div class="form-group">
                  <label>Danh sách hội đồng</label>
                  <select multiple class="form-control" id="sel1" name="id_quantri[]">
                        @foreach($quantris as $quantri)
                        <?php $phongban=App\phongban::find($quantri->phongBan); ?>
                    <option value="{{$quantri->id}}">{{$quantri->namclass}} - {{$phongban->tenphongabn}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              </div>
              <div id="menu11" class="tab-pane fade">

               <div class="col-md-12">
                <div class="form-group">
                  <label>Căn cứ pháp lý</label>
                  
                  <textarea class="form-control" id="ck3" name="cancuphaply">

                  </textarea>
                   <script src="public/ckeditor/ckeditor.js"></script>
                  <script>
                    CKEDITOR.replace('ck3' );
                  </script>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Thành phần hội đồng</label>
                  
                  <textarea class="form-control" id="ck1" name="thanhphannt">
                  </textarea>

                  <script src="public/ckeditor/ckeditor.js"></script>
                  <script>
                    CKEDITOR.replace('ck1' );
                  </script>



                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Bộ phận thực hiện</label>
                  
                  <textarea class="form-control" id="ck2"  name="bophanthuchien">

                  </textarea>

                   <script src="public/ckeditor/ckeditor.js"></script>
                  <script>
                    CKEDITOR.replace('ck2' );
                  </script>

                </div>
              </div>

              </div>

            </div>
            <button style="float:right;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>

          </form>

        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>






  @endsection




