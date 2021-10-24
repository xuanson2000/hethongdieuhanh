<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xuất báo cáo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  body{

    font-family: Times New Roman;
  }
</style>
</head>
<body>


  <div class="container12" style="width: 1000px;  margin: 0 auto; margin-top: 50px; margin-bottom: 20px;"> 

   <?php 
   $nhiemvu_donvithuchienid=App\nhiemvu_donvithuchien::find($nghiemthucapcosoid->id_nhiemvu_donvi);
   $phongban=App\phongban::find($nhiemvu_donvithuchienid->id_donvi);

   ?>


    <div class="row top" style="width: 100%; ">
      <div style="float: left; width: 50%; text-align: center; " >   <p style="font-size: 13px; margin-bottom: 3px; font-family: times new roman;  "> {{$phongban->tenviethoa}} </p>    <p style="font-size: 14px; font-weight: bold; margin-bottom: 3px; font-family: times new roman;  ">HỘI ĐỒNG NGHIỆM THU  </p>
        <p> Số: ..................................</p>

      </div>

      <div style="float: right;width: 50%;text-align: center;"> <p style="font-weight: bold; margin-bottom: 3px; font-family: times new roman;font-size: 14px;  ">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM </p> <p>Độc lập - Tự do - Hạnh phúc</p> 
        <i style="font-family: times new roman; font-size: 12px;">........, ngày...tháng...năm 20...</i></div>
      </div>

   </div>

    <p style="margin-bottom:10px; margin-top: 20px; font-weight: bold; text-align: center; color: blue; font-size: 14px;">BIÊN BẢN NGHIỆM THU NIÊN ĐỘ
    </p>
         <p style="margin-bottom:10px; margin-top: 20px; font-weight: bold; text-align: center; color: blue; font-size: 12px;">( 6 THÁNG ĐẦU NĂM )
    </p>

    <p style="text-align:center;font-weight: bold;">Dự án: {{$nhiemvu_donvithuchienid->noidung}}<i></i> </p>
   
    <div class="col-md-12">
    	<p> {!!$nghiemthucapcosoid->cancuphaply!!}</p>
    	<p style="font-weight:bold;">1. Thành phần nghiệm thu gồm: </p>
    	<p>a. Hội đồng nghiệm thu: ghi đầy đủ danh sách Hội đồng nghiệm thu theo quyết định.</p>
    	 <p>{!!$nghiemthucapcosoid->thanhphannt!!}</p>
    	 <p>b. Đơn vị(Bộ phận) thực hiện: </p>
    	 <p> {!!$nghiemthucapcosoid->bophanthuchien!!}</p>
   <p style="font-weight:bold;">2. Thời gian nghiệm thu</p>
 
     <p>- Bắt đầu : {{ date('d-m-Y',strtotime($nghiemthucoso_chuyengiaid->ngabt))}} </p>
    <p>- Kết thúc : {{ date('d-m-Y',strtotime($nghiemthucoso_chuyengiaid->ngaykt))}} </p>


    <p style="font-weight:bold;">3. Khối lượng nghiệm thu</p>

    <table class="table table-bordered">
    	<thead>
    		<tr>
    			<th>Số TT</th>
    			<th>Tên công việc, sản phẩm</th>
    			<th>Đơn vị tính</th>
    			<th>Khối lượng được duyệt</th>
    			<th>Khối lượng thưc hiện 6 tháng đầu năm</th>
    			<th>Khối lượng nghiệm thu</th>
    			<th>Ghi chú</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($phuluckhoiluongtts as $phuluckhoiluongtt )
    		<tr>
    			<td>{{$phuluckhoiluongtt->stt}}</td>
    			<td>{{$phuluckhoiluongtt->noidung}}</td>
    			<td>{{$phuluckhoiluongtt->dvt}}</td>
    			<td>{{$phuluckhoiluongtt->khoiluong}}</td>
    			<td>{{$phuluckhoiluongtt->thcs6t}}</td>
    			<td>{{$phuluckhoiluongtt->ntcs6t}}</td>
    			<td>@if($phuluckhoiluongtt->khoiluong!=null && $phuluckhoiluongtt->ntcs6t!=null && $phuluckhoiluongtt->khoiluong!=0) {{ round(($phuluckhoiluongtt->ntcs6t/$phuluckhoiluongtt->khoiluong)*100 )}}% @endif</td>
    		</tr>
    		@endforeach
    		
    	</tbody>
    </table>

       <p style="font-weight:bold;">4. Đánh giá về khối lượng</p>
       <p>{!!$nghiemthucoso_chuyengiaid->danhgiakhoiluong!!}</p>
         <p style="font-weight:bold;">5. Đánh giá về chất lượng</p>
       <p>{!!$nghiemthucoso_chuyengiaid->danhgiachatluong!!}</p>
         <p style="font-weight:bold;">6. Kết luận chung</p>
       <p>{!!$nghiemthucoso_chuyengiaid->ketluan!!}</p>
        <p style="font-weight:bold;">7.Kiến nghị</p>
       <p>{!!$nghiemthucoso_chuyengiaid->kiennghi!!}</p>

   </div>






   <div class="ttsv" style="width: 100%; margin:0 auto; margin-top:50px; margin-bottom: 30px; margin-bottom: 270px;" >

    <table>
      <thead>
      	<tr>
      		<th style="width: 30%;">Chủ nhiệm nhiệm vụ</th>
      		<th style="width: 30%;">Đại diện cán bộ nghiệm thu</th>
      		<th style="width: 30%;">Chủ tịch hội đồng nghiệm thu</th>
      	</tr>
      </thead>
     
    </table>

    </div>

    <style type="text/css">

    td{
      padding: 5px 5px 5px 5px;
    }
    th{
      padding: 5px 5px 5px 5px;
    }
  </style>

</body>
</html>


