@extends('khoangsan1.layout')
@section("content13")

<style type="text/css">
th{
  text-align: center;
  font-size: 14px;
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
 <!--  <ol class="breadcrumb">
      <a style="float: right;padding: 5px 10px 5px 10px; margin-bottom: 5px; margin-top: -15px;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
    </ol>

  -->
</section>



<div class="container" style="background-color: white; padding: 20px 10px 20px 10px; width: 100%;">
  

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
  <div class="row" style="background-color: #4276BB; width: 100%; margin: 0 auto;">
   <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; "> <span style="color: #FFB724; font-weight: bold;"> NGHIỆM THU, ĐÁNH GIÁ </span></h4>

   <a title="Đóng" href="{{route('nhiemvuchuyenmonttnghiemthu')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-info" > <i class="fa fa-times" aria-hidden="true"></i></a>
   
     <a title="Đề nghị nghiệm thu cấp quản lý" href=""  data-toggle="modal" data-target="#myModal1" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

     <a title="Thành lập hội đồng nghiệm thu" href=""  data-toggle="modal" data-target="#myModal" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-plus" aria-hidden="true"></i></a>

  </div>

<ul class="nav nav-tabs" style="margin-top:15px;">
    <li class="active"><a data-toggle="tab" href="#home">Quyết định đặt hàng, giao nhiệm vụ</a></li>
    <li><a data-toggle="tab" href="#menu1">Cơ sở NT 6T ĐN </a></li>
    <li><a data-toggle="tab" href="#menu2">Cơ sở NT 6T CN</a></li>
    <li><a data-toggle="tab" href="#menu3">Quản lý NT 6T ĐN</a></li>
    <li><a data-toggle="tab" href="#menu4">Quản lý NT 6T CN</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <?php 
      $nhiemvuchuyenmon=App\nhiemvuchuyenmon::find($nhiemvu_donvithuchien->id_nhiemvu);
      ?>

    <table class="table">

    <tbody>
      <tr>
        <td>Số quyết định</td>
        <td style="width: 75%;">{{$nhiemvu_donvithuchien->soqd}}</td>
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
          <a href="public/tailieu/{{$nhiemvu_donvithuchien->file}}">file_quyetdinh_dat_hang.pdf</a> 
        </td>
      </tr>

 
    </tbody>
  </table>
 <p style="font-weight:bold; margin-left:5px;"> HỒ SƠ NHIỆM VỤ </p>
 <table class="table" style="margin-top:10px;">
      <tbody>
        <tr>
          <td style="width: 25%;">Quyết định phê quyệt nhiệm vụ:  </td>
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
  $nghiemthucapcosos=App\nghiemthucapcoso::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->where('loainghiemthu',6)->get();
  // 

   ?>

       <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Quyết định thành lập hội đồng nghiệm thu</h5>

    <table class="table table-bordered">
    <thead style="background-color:#C9E3FC;">
      <tr>
        <th >Số QĐ</th>
        <th>Ngày quyết định</th>
        <th>Nội dung</th>
        <th>File quyết định</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach($nghiemthucapcosos as $nghiemthucapcoso)
      <?php 
      $nghiemthucoso_chuyengias=App\nghiemthucoso_chuyengia::where('id_nvcs',$nghiemthucapcoso->id)->get();
      ?>
      <tr>
        <td>{{$nghiemthucapcoso->soqd}}</td>
        <td>{{$nghiemthucapcoso->ngayqd}}</td>
        <td>{{$nghiemthucapcoso->noidung}}</td>
         <td> <a href="public/tailieu/{{$nghiemthucapcoso->file}}"> file quyết đinh</a> </td>
         <td><a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')" href="{{route('xoanghiemthucs',[$nghiemthucapcoso->id])}}" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

      </tr>
      <tr>
      <td colspan="5">
        <?php 
        $phuluckhoiluongtts=App\phuluckhoiluongtt::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->orderBy('id','ASC')->get();
        ?>


      <div class="modal fade" id="thgtntcs6t" role="dialog" >
        <div class="modal-dialog modal-lg" style="width: 85%;">
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
                    <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Tên công việc, sản phẩm</th>
                    <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Đơn vị tính</th>
                    <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Đơn giá</th>
                    <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Khối lượng được duyệt năm </th>
                    <!-- <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Khối lượng thực hiện 6 tháng đầu năm</th> -->
                    <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Khối lượng nghiệm thu 6 tháng đầu năm</th>
                     <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Đơn giá điều chỉnh</th>
                      <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Thành tiền</th>


                    <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Ghi chú</th>
                    

                  </tr>

                </thead>
                <tbody style="height: 352px; overflow: auto;">
                  
                  <?php $b=0;$c=0; ?>
                  @foreach($phuluckhoiluongtts as $phuluckhoiluongtt)
                  <?php 
                     if($phuluckhoiluongtt->chithuongxuyen!=0){
                      if($phuluckhoiluongtt->dongiadc6tcs!=null){
                        $b=$b+(($phuluckhoiluongtt->dongiadc6tcs)*($phuluckhoiluongtt->ntcs6t));

                      }else{
                        $b=$b+(($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntcs6t));

                      }

                     }

                     if($phuluckhoiluongtt->khongthuongxuyen!=0){

                      if($phuluckhoiluongtt->dongiadc6tcs!=null){
                        $c=$c+(($phuluckhoiluongtt->dongiadc6tcs)*($phuluckhoiluongtt->ntcs6t));

                      }else{
                        $c=$c+(($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntcs6t));

                      }

                     }
                    
                  ?>
                  <tr>
                    <td>{{$phuluckhoiluongtt->stt}}</td>
                    <td>{{$phuluckhoiluongtt->noidung}}</td>
                    <td>{{$phuluckhoiluongtt->dvt}}</td>
                     <td>{{$phuluckhoiluongtt->dongia}}</td>
                    <td>{{$phuluckhoiluongtt->khoiluong}}</td>
                    <!-- <td>{{$phuluckhoiluongtt->thcs6t}}</td> -->
                    <td>{{$phuluckhoiluongtt->ntcs6t}}</td>
                    <td>{{$phuluckhoiluongtt->dongiadc6tcs}}</td>
                    <td>@if($phuluckhoiluongtt->khoiluong!=null)  @if($phuluckhoiluongtt->dongiadc6tcs!=null) {{($phuluckhoiluongtt->dongiadc6tcs)*($phuluckhoiluongtt->ntcs6t)}} @else {{($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntcs6t)}} @endif @endif</td>

                    <td> @if($phuluckhoiluongtt->ntcs6t!=null && $phuluckhoiluongtt->thcs6t !=null)  {{ round((($phuluckhoiluongtt->ntcs6t)/($phuluckhoiluongtt->thcs6t))*100 )}} % @endif</td>
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
   <div class="col-md-2">  <button type="button" style="font-size: 12px; float: right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#thgtntcs6t"><i class="fa fa-align-justify" aria-hidden="true"></i> TH Giá trị NT</button></div>

     

         <table class="table table-bordered "  style="width:100%;">
          <thead style="background-color:#C9E3FC;">
            <tr>
              <th>STT</th>
              <th>Cán bộ nghiệm thu</th>
              <th>Biên bản nghiệm thu</th>
              <th>Biên bản nghiệm thu 1</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>

           @foreach($nghiemthucoso_chuyengias as $nghiemthucoso_chuyengia)
           <?php  $quantri=App\quantri::find($nghiemthucoso_chuyengia->id_quantri);?>
           <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$quantri->namclass}}</td>
            <td> @if($nghiemthucoso_chuyengia->bienban !=null) <a href="public/tailieu/{{$nghiemthucoso_chuyengia->bienban}}"> bienbannghiemthu.pdf</a> @endif</td>
            <td>@if($nghiemthucoso_chuyengia->trangthai ==1)
             <a href="{{route('xuatbienbanntcs12t',[$nghiemthucoso_chuyengia->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> Xem biên bản</a>
             @endif  </td>
            <td>  <a href="{{route('giaohmcvnt',[$nghiemthucoso_chuyengia->id_quantri,$nghiemthucapcoso->id])}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Giao hạng mục NT</a>&emsp;  @if($nghiemthucoso_chuyengia->trangthai ==1)  <a href="{{route('guilaibienbancs',[$nghiemthucoso_chuyengia->id])}}"><i class="fa fa-whatsapp" aria-hidden="true"></i> Đề nghị gửi lại</a> @endif 

             </td>
          </tr>
          @endforeach
          <tr>
            <td>{{count($nghiemthucoso_chuyengias)+1}}</td>
            <td>Thư ký hội đồng</td>
            <td></td>
            <td>  <a href="{{route('xuattaobienbanthcsth',[$nghiemthucapcoso->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> Biên bản tổng hợp </a> &emsp;  
              <a href="{{route('downloaddongiacs',[$nhiemvu_donvithuchien->id,$nghiemthucapcoso->loainghiemthu])}}"><i class="fa fa-cloud-download" aria-hidden="true"></i> Phụ lục </a>
            </td>

            <td>
              <a title="Thêm biên bản tổng hợp" href="{{route('taobienbanthcsth',[$nghiemthucapcoso->id])}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Thêm BBNTH</a> &emsp; &emsp; 

              <a style="color:red" title="Điều chỉnh đơn giá" href="{{route('dieuchinhdongiacs',[$nhiemvu_donvithuchien->id,$nghiemthucapcoso->loainghiemthu])}}"> <i class="fa fa-cog" aria-hidden="true"></i>  Điều chỉnh đơn giá</a>

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
  $nghiemthucapcosos=App\nghiemthucapcoso::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->where('loainghiemthu',12)->get();
  // 

   ?>
      <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Quyết định thành lập hội đồng nghiệm thu</h5>

    <table class="table table-bordered">
    <thead style="background-color:#C9E3FC;">
      <tr>
        <th>Số QĐ</th>
        <th>Ngày quyết định</th>
        <th>Nội dung</th>
         <th>File quyết định</th>
            <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach($nghiemthucapcosos as $nghiemthucapcoso)
      <?php 
      $nghiemthucoso_chuyengias=App\nghiemthucoso_chuyengia::where('id_nvcs',$nghiemthucapcoso->id)->get();


      ?>
   
      <tr>
        <td>{{$nghiemthucapcoso->soqd}}</td>
        <td>{{$nghiemthucapcoso->ngayqd}}</td>
        <td>{{$nghiemthucapcoso->noidung}}</td>
         <td> <a href="public/tailieu/{{$nghiemthucapcoso->file}}"> file quyết đinh</a> </td>
          <td><a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')" href="{{route('xoanghiemthucs',[$nghiemthucapcoso->id])}}" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
      <tr>
        <td colspan="5"> 

         <?php 
         $phuluckhoiluongtts=App\phuluckhoiluongtt::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->orderBy('id','ASC')->get();
         ?>


      <div class="modal fade" id="thgtntcs12t" role="dialog">
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
                    <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Khối lượng nghiệm thu </th>
                      <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Đơn giá điều chỉnh</th>
                      <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Thành tiền</th>

                    
                    <th style=" background: white;position: sticky;top: 0;box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" >Ghi chú</th>
                  </tr>

                </thead>
                <tbody style="height: 352px; overflow: auto;">

             <?php $d=0; $e=0;?>
           @foreach($phuluckhoiluongtts as $phuluckhoiluongtt)

            <?php 
            if($phuluckhoiluongtt->chithuongxuyen!=0){
              if($phuluckhoiluongtt->dongiadc12tcs!=null){
                $d=$d+(($phuluckhoiluongtt->dongiadc12tcs)*($phuluckhoiluongtt->ntcs12t));

              }else{
                $d=$d+(($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntcs12t));

              }

            }

            if($phuluckhoiluongtt->khongthuongxuyen!=0){

              if($phuluckhoiluongtt->dongiadc12tcs!=null){
                $e=$e+(($phuluckhoiluongtt->dongiadc12tcs)*($phuluckhoiluongtt->ntcs12t));

              }else{
                $e=$e+(($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntcs12t));

              }

            }

            ?>

            <tr>
              <td>{{$phuluckhoiluongtt->stt}}</td>
              <td>{{$phuluckhoiluongtt->noidung}}</td>
              <td>{{$phuluckhoiluongtt->dvt}}</td>
              <td>{{$phuluckhoiluongtt->khoiluong}}</td>
              <td>{{$phuluckhoiluongtt->ntcs6t}}</td>
              <td>{{$phuluckhoiluongtt->thcs12t}}</td>
              <td>{{$phuluckhoiluongtt->ntcs12t}}</td>

              <td>{{$phuluckhoiluongtt->dongiadc12tcs}}</td>

              <td>@if($phuluckhoiluongtt->khoiluong!=null)  @if($phuluckhoiluongtt->dongiadc12tcs!=null) {{($phuluckhoiluongtt->dongiadc12tcs)*($phuluckhoiluongtt->ntcs12t)}} @else {{($phuluckhoiluongtt->dongia)*($phuluckhoiluongtt->ntcs12t)}} @endif @endif</td>

              <td> @if($phuluckhoiluongtt->ntcs12t!=null && $phuluckhoiluongtt->khoiluong !=0 && $phuluckhoiluongtt->khoiluong !=null)  {{round((($phuluckhoiluongtt->ntcs12t + $phuluckhoiluongtt->ntcs6t)/($phuluckhoiluongtt->khoiluong))*100 )}} % @endif</td>

            </tr>
            @endforeach
                </tbody>
              </table> 
            </div>
            <div class="modal-footer">
               <p style="font-weight:bold;">Tổng giá trị nghiệm thu:{{$d+$e}}  đồng</p>
               <p style="font-weight:bold;">Chi thường xuyên: {{$d}} đồng </p>
               <p style="font-weight:bold;">Không thường xuyên:{{$e}} đồng</p>

            </div>
          </div>
        </div>
      </div>





      <div class="col-md-10">      <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Biên bản nghiệm thu</h5></div>
      <div class="col-md-2">  <button type="button" style="font-size: 12px; float: right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#thgtntcs12t"><i class="fa fa-align-justify" aria-hidden="true"></i> TH Giá trị NT</button></div>



      <table class="table table-bordered " style="width: 100%;">
        <thead style="background-color:#C9E3FC;">
          <tr>
            <th>STT</th>
            <th>Người gửi bản</th>
            <th>Biên bản nghiệm thu</th>
            <th>Biên bản nghiệm thu 1</th>
            <th>Thao tác</th>
          </tr>
        </thead>

        <tbody>
         @foreach($nghiemthucoso_chuyengias as $nghiemthucoso_chuyengia)
         <?php  $quantri=App\quantri::find($nghiemthucoso_chuyengia->id_quantri);
         ?>
         <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$quantri->namclass}}</td>
          <td> @if($nghiemthucoso_chuyengia->bienban !=null) <a href="public/tailieu/$nghiemthucoso_chuyengia->bienban"> bienbannghiemthu.pdf</a> @endif</td>
          <td>
            @if($nghiemthucoso_chuyengia->trangthai ==1) 
           <a href="{{route('xuatbienbanntcs6t',[$nghiemthucoso_chuyengia->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> Xem biên bản </a>
            @endif
          </td>
          <td> <a href="{{route('giaohmcvnt',[$nghiemthucoso_chuyengia->id_quantri,$nghiemthucapcoso->id])}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Giao hạng mục NT</a>&emsp;  @if($nghiemthucoso_chuyengia->trangthai ==1)  <a href="{{route('guilaibienbancs',[$nghiemthucoso_chuyengia->id])}}"> <i class="fa fa-whatsapp" aria-hidden="true"></i> Đề nghị gửi lại</a> @endif </td>

        </tr>
        @endforeach

        <tr>
          <td>{{count($nghiemthucoso_chuyengias)+1}}</td>
          <td>Thư ký hội đồng</td>
          <td></td>
          <td> <a href="{{route('xuattaobienbanthcsth',[$nghiemthucapcoso->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> Biên bản tổng hợp </a> &emsp;
            <a href="{{route('downloaddongiacs',[$nhiemvu_donvithuchien->id,$nghiemthucapcoso->loainghiemthu])}}"><i class="fa fa-cloud-download" aria-hidden="true"></i> Phụ lục </a>

           </td>
          <td> <a href="{{route('taobienbanthcsth',[$nghiemthucapcoso->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Thêm BBNTTH</a>&emsp;&emsp;

             <a style="color:red;" title="điều chỉnh đơn giá" href="{{route('dieuchinhdongiacs',[$nhiemvu_donvithuchien->id,$nghiemthucapcoso->loainghiemthu])}}"><i class="fa fa-cog" aria-hidden="true"></i> Điều chỉnh đơn giá</a>

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



    <div id="menu3" class="tab-pane fade">
      <?php
      $nghiemthucapqls=App\nghiemthucapquanly::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->where('loainghiemthu',6)->get();
  

      ?>
      <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Hồ sơ đề nghị nghiệm thu cấp quản lý</h5>

      <table class="table table-bordered">

        <tbody>
          <tr>
            <td>Báo cáo tình hình thực hiện: </td>
            <td> @if($nhiemvu_donvithuchien->file_bcthth !=null)<a href="{{$nhiemvu_donvithuchien->file_bcthth}}">file_bcthth.pdf</a> @endif </td>

          </tr>

          <tr>
            <td>Đề nghị nghiệm thu</td>
            <td> @if($nhiemvu_donvithuchien->file_denghinghiemthu !=null)  <a href="{{$nhiemvu_donvithuchien->file_denghinghiemthu}}">file_denghinghiemthu.pdf</a> @endif  </td>

          </tr>
          <tr>
            <td>Kế hoạch nghiệm thu</td>
            <td> @if($nhiemvu_donvithuchien->file_kehoachnghiemthu !=null)  <a href="{{$nhiemvu_donvithuchien->file_kehoachnghiemthu}}">file_kehoachnghiemthu.pdf</a>@endif</td>

          </tr>
          <tr>
            <td>Báo cáo nghiệm thu cấp cơ sở</td>
            <td> @if($nhiemvu_donvithuchien->file_ntccs !=null)  <a href="{{$nhiemvu_donvithuchien->file_ntccs}}">file_ntccs.pdf </a> @endif</td>

          </tr>


        </tbody>
      </table>


      <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Quyết định thành lập hội đồng nghiệm thu</h5>


    <table class="table table-bordered">
    <thead style="background-color:#C9E3FC;">
      <tr>
        <th>Số QĐ</th>
        <th>Ngày quyết định</th>
        <th>Nội dung</th>
         <th>File quyết định</th>
      </tr>
    </thead>
    <tbody>
      @foreach($nghiemthucapqls as $nghiemthucapql)
      <?php 

      
      $nghiemthuql_chuyengias=App\nghiemthucapquanly_chuyengia::where('id_ntql',$nghiemthucapql->id)->get();
   
      ?>
   
      <tr>
        <td>{{$nghiemthucapql->soqd}}</td>
        <td>{{$nghiemthucapql->ngayqd}}</td>
        <td>{{$nghiemthucapql->noidung}}</td>
         <td> <a href="public/tailieu/{{$nghiemthucapql->file}}"> file quyết đinh</a> </td>
      </tr>
      <tr>
        <td colspan="4"> 
             <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Biên bản nghiệm thu</h5>

         <table class="table table-bordered " style="width: 100%;">
          <thead style="background-color:#C9E3FC;">
            <tr>
              <th>STT</th>
              <th>Người gửi bản</th>
              <th>Biên bản nghiệm thu</th>
             
            </tr>
          </thead>
          <tbody>
           @foreach($nghiemthuql_chuyengias as $nghiemthuql_chuyengia)
           <?php  $quantri=App\quantri::find($nghiemthuql_chuyengia->id_quantri);?>
           <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$quantri->namclass}}</td>
            <td> 

             @if($nghiemthuql_chuyengia->trangthai==1)  
             <a href="{{route('xuatbienbanntql6t',[$nghiemthuql_chuyengia->id])}}">Xem</a>
             @endif

              </td>
            

          </tr>
          @endforeach

           <tr>
              <td>{{count($nghiemthuql_chuyengias)+1}}</td>
              <td>Thư ký hội đồng</td>
           
              <td> <a href="{{route('xuattaobienbanthqlth',[$nghiemthucapql->id])}}">Xem </a> </td>
             

            </tr>

        </tbody>
      </table>
        </td>
      </tr>


      @endforeach
    </tbody>
  </table>

    </div>



    <div id="menu4" class="tab-pane fade">
      <?php
    $nghiemthucapq12ls=App\nghiemthucapquanly::where('id_nhiemvu_donvi',$nhiemvu_donvithuchien->id)->where('loainghiemthu',12)->get();

   ?>
   <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Hồ sơ đề nghị nghiệm thu cấp quản lý</h5>

      <table class="table table-bordered">

        <tbody>
          <tr>
            <td>Báo cáo tình hình thực hiện: </td>
            <td> @if($nhiemvu_donvithuchien->file_bcthth12 !=null) <a href="{{$nhiemvu_donvithuchien->file_bcthth12}}"> file_bcthth12.pdf</a> @endif</td>

          </tr>

          <tr>
            <td>Đề nghị nghiệm thu</td>
            <td> @if($nhiemvu_donvithuchien->file_denghinghiemthu12 !=null)<a href=" {{$nhiemvu_donvithuchien->file_denghinghiemthu12}}">file_denghinghiemthu12.pdf</a>@endif</td>

          </tr>
          <tr>
            <td>Kế hoạch nghiệm thu</td>
            <td> @if($nhiemvu_donvithuchien->file_kehoachnghiemthu12 !=null) <a href="{{$nhiemvu_donvithuchien->file_kehoachnghiemthu12}}">file_kehoachnghiemthu12.pdf</a>@endif</td>

          </tr>
          <tr>
            <td>Báo cáo nghiệm thu cấp cơ sở</td>
            <td>  @if($nhiemvu_donvithuchien->file_ntccs12 !=null)<a href="{{$nhiemvu_donvithuchien->file_ntccs12}}">file_ntccs12.pdf</a>@endif </td>

          </tr>


        </tbody>
      </table>



      <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i>  Quyết định thành lập hội đồng nghiệm thu</h5>

    <table class="table table-bordered">
    <thead style="background-color:#C9E3FC;">
      <tr>
        <th>Số QĐ</th>
        <th>Ngày quyết định</th>
        <th>Nội dung</th>
         <th>File quyết định</th>
      </tr>
    </thead>
    <tbody>
      @foreach($nghiemthucapq12ls as $nghiemthucapq12l)
      <?php 

      $nghiemthuql_chuyengias=App\nghiemthucapquanly_chuyengia::where('id_ntql',$nghiemthucapq12l->id)->get();


      ?>
   
      <tr>
        <td>{{$nghiemthucapq12l->soqd}}</td>
        <td>{{$nghiemthucapq12l->ngayqd}}</td>
        <td>{{$nghiemthucapq12l->noidung}}</td>
         <td> <a href="public/tailieu/{{$nghiemthucapq12l->file}}"> file quyết đinh</a> </td>
      </tr>
      <tr>
        <td colspan="4"> 
          <h5 style="font-weight:bold;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Biên bản nghiệm thu</h5>

         <table class="table table-bordered " style="width: 100%;">
          <thead style="background-color:#C9E3FC;">
            <tr>
              <th>STT</th>
              <th>Người gửi bản</th>
              <th>Biên bản nghiệm thu</th>
              
            </tr>
          </thead>
          <tbody>
           @foreach($nghiemthuql_chuyengias as $nghiemthuql_chuyengia)
           <?php  $quantri=App\quantri::find($nghiemthuql_chuyengia->id_quantri);?>
           <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$quantri->namclass}}</td>
            <td> 

             @if($nghiemthuql_chuyengia->trangthai==1)  
             <a href="{{route('xuatbienbanntql12t',[$nghiemthuql_chuyengia->id])}}">Xem</a>
             @endif

              </td>
            </tr>
            @endforeach
            <tr>
              <td>{{count($nghiemthuql_chuyengias)+1}}</td>
              <td>Thư ký hội đồng</td>
           
              <td> <a href="{{route('xuattaobienbanthqlth',[$nghiemthucapq12l->id])}}">Xem </a> </td>
             

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




  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:blue; font-weight:bold;" class="modal-title">Thành lập hội đồng nghiệm thu </h4>
        </div>
        <div class="modal-body" >
          
          <form action="{{route('nhapquyetdinhnghiemthucoso',[$nhiemvu_donvithuchien->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >

            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#ABA">Thông tin quyết định hội đồng nghiệm thu</a></li>
              <li><a data-toggle="tab" href="#ABC">Thông tin biên bản nghiệm thu</a></li>

            </ul>

            <div class="tab-content">
              <div id="ABA" class="tab-pane fade in active">
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Loại nghiệm thu</label>
                    <select class="form-control"  name="loainghiemthu" required="">
                       <option value="">Chọn loại hình nghiệm thu</option>
                      <option value="6">6 Tháng đầu năm</option>
                      <option value="12">6 Tháng cuối năm</option>
                    </select>
                  </div>
                </div>

            


              <div class="col-md-6">
                <div class="form-group">
                  <label>Số quyết định</label>
                  <input class="form-control"  type="text" name="soqd">
                </div>
              </div>


              <div class="col-md-12">
                <div class="form-group">
              <label>Ngày quyết định</label>
              <input class="form-control" type="date" name="ngayqd">
            </div>
                
              </div>
              <div class="col-md-12">
                <div class="form-group">
              <label>Nội dung</label>
              <input class="form-control" type="text" name="noidung">
            </div>
                
              </div>
              <div class="col-md-12">
                <div class="form-group">
              <label>File quyết định</label>
              <input class="form-control" type="file" name="file">
            </div>

                
              </div>
              <div class="col-md-12">
                <div class="form-group">
              <label>Thành viên</label>
              <?php 

            $quantris=App\quantri::get();
              ?>
              <select multiple class="form-control" name="id_quantri[]">
                @foreach($quantris as $quantri)
                <?php 
                $phongban=App\phongban::find($quantri->phongBan);
                ?>

                <option value="{{$quantri->id}}">{{$quantri->namclass}}-{{$phongban->tenphongabn}} </option>
                @endforeach
                
              </select>
            </div>  
              </div>

              </div>
              <div id="ABC" class="tab-pane fade">
                <div class="col-md-12">
                <div class="form-group">
                  <label>Căn cứ pháp lý</label>

                  
                  <textarea class="form-control" id="summary-ckeditor"  name="cancuphaply">
                    
                  </textarea>
                   <script src="public/ckeditor/ckeditor.js"></script>
                  <script>
                    CKEDITOR.replace('summary-ckeditor' );
                  </script>



                </div>
              </div>

               <div class="col-md-12">
                <div class="form-group">
                  <label>Thành phần hội đồng</label>
                  
                  <textarea class="form-control" id="summary-ckeditor1" name="thanhphannt">
                    
                  </textarea>
                  <script>
                    CKEDITOR.replace( 'summary-ckeditor1' );
                  </script>
                </div>
              </div>

               <div class="col-md-12">
                <div class="form-group">
                  <label>Bộ phận thực hiện</label>
                  
                  <textarea class="form-control" id="summary-ckeditor2" name="bophanthuchien">
                    
                  </textarea>
                  <script>
                    CKEDITOR.replace( 'summary-ckeditor2' );
                  </script>
                </div>
              </div>


                  <button style="float:right;" type="submit" class="btn btn-warning"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
              </div>



            </div>

          
            
          

          </form>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>








  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:blue; font-weight:bold;" class="modal-title">Đề nghị nghiệm thu cấp quản lý </h4>
        </div>
        <div class="modal-body">
          
          <form action="{{route('denghinghiemthuquanly',[$nhiemvu_donvithuchien->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >

              <div class="col-md-12">
                <div class="form-group">
                  <label>Loại nghiệm thu</label>
                  <select class="form-control"  name="loainghiemthu" required="">
                     <option value="">Chọn loại nghiệm thu</option>
                    <option value="6">6 Tháng đầu năm</option>
                    <option value="12">6 Tháng cuối năm</option>
                  

                  </select>
                </div>
              </div>

            
              <div class="col-md-6">
                <div class="form-group">
                  <label>Báo báo tình hình thực hiện</label>
                  <input class="form-control" type="file" name="file_bcthth">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Hồ sơ đề nghị nghiệm thu</label>
                  <input class="form-control" type="file" name="file_denghinghiemthu">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Kế hoạch nghiệm thu</label>
                  <input class="form-control" type="file" name="file_kehoachnghiemthu">
                </div>
              </div>

               <div class="col-md-6">
                <div class="form-group">
                  <label>Hồ sơ nghiệm thu cấp cơ sở</label>
                  <input class="form-control" type="file" name="file_ntccs">
                </div>
              </div>

            
            <button style="float:right;" type="submit" class="btn btn-default">Gửi đi</button>

          </form>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>






  @endsection




