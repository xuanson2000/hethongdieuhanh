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
    $nhiemvu_donvi=App\nhiemvu_donvithuchien::find($nghiemthucapquanlyid->id_nhiemvu_donvi);
    ?>



    <div class="row top" style="width: 100%; ">
      <div style="float: left; width: 50%; text-align: center; " >   <p style="font-size: 13px; margin-bottom: 3px; font-family: times new roman; font-size: 14px; "> TRUNG TÂM QUY HOẠCH VÀ ĐIỀU TRA TÀI NGUYÊN NƯỚC QUỐC GIA </p>    <p style="font-size: 14px; font-weight: bold; margin-bottom: 3px; font-family: times new roman;  ">HỘI ĐỒNG NGHIỆM THU  </p>
        <p> Số: ..................................</p>

      </div>

      <div style="float: right;width: 50%;text-align: center;"> <p style="font-weight: bold; margin-bottom: 3px; font-family: times new roman;font-size: 14px;  ">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM </p> <p>Độc lập - Tự do - Hạnh phúc</p> 
        <i style="font-family: times new roman; font-size: 12px;">........, ngày...tháng...năm 20...</i></div>
      </div>

   </div>

    <p style="margin-bottom:10px; margin-top: 20px; font-weight: bold; text-align: center; color: blue; font-size: 14px;">BIÊN BẢN NGHIỆM THU NIÊN ĐỘ
    </p>

    <p style="margin-bottom:10px; margin-top: 20px; font-weight: bold; text-align: center; color: blue; font-size: 14px;">(6 THÁNG ĐẦU NĂM)
    </p>

    <p style="text-align:center;font-weight: bold;">Dự án:{{ $nhiemvu_donvi->noidung}} <i></i> </p>
   
    <div class="col-md-12">
    	<p> {!! $nghiemthucapquanlyid->cancuphaply !!} </p>
    	<p style="font-weight:bold;">1. Thành phần nghiệm thu gồm: </p>
    	<p>a. Hội đồng nghiệm thu: ghi đầy đủ danh sách Hội đồng nghiệm thu theo quyết định.</p>
    	 <p>{!! $nghiemthucapquanlyid->thanhphannt !!}</p>
    	 <p>b. Đơn vị(Bộ phận) thực hiện: </p>
    	 <p> {!! $nghiemthucapquanlyid->bophanthuchien !!}</p>
   <p style="font-weight:bold;">2. Thời gian nghiệm thu</p>
  
     <p>- Bắt đầu : {{ date('d-m-Y',strtotime($nghiemthucapquanly_chuyengiaid->ngabt))}} </p>
    <p>- Kết thúc : {{ date('d-m-Y',strtotime($nghiemthucapquanly_chuyengiaid->ngaykt))}} </p>


    <p style="font-weight:bold;">3. Khối lượng nghiệm thu</p>

    <table class="table table-bordered">
    	<thead>
    		<tr>
    			<th>Số TT</th>
    			<th>Tên công việc, sản phẩm</th>
    			<th>Đơn vị tính</th>
    			<th>Khối lượng được duyệt</th>
    			<th>Khối lượng thưc hiện 6 tháng cuối năm</th>
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
    			<td>{{$phuluckhoiluongtt->thql6t}}</td>
    			<td>{{$phuluckhoiluongtt->ntql6t}}</td>
    			<td>@if($phuluckhoiluongtt->ntql6t !=null && $phuluckhoiluongtt->khoiluong !=null  && $phuluckhoiluongtt->khoiluong !=0) {{ round(($phuluckhoiluongtt->ntql6t/$phuluckhoiluongtt->khoiluong)*100)}} % @endif</td>
    		</tr>
    		@endforeach
    		
    	</tbody>
    </table>

    <p style="font-weight:bold;">4. Đánh giá về khối lượng</p>
    <p>{!! $nghiemthucapquanly_chuyengiaid->danhgiakhoiluong !!}</p>
    <p style="font-weight:bold;">5. Đánh giá về chất lượng</p>
    <p>{!! $nghiemthucapquanly_chuyengiaid->danhgiachatluong !!}</p>
    <p style="font-weight:bold;">6. Kết luận chung</p>
    <p>{!! $nghiemthucapquanly_chuyengiaid->ketluan !!}</p>
    <p style="font-weight:bold;">7.Kiến nghị</p>
    <p>{!! $nghiemthucapquanly_chuyengiaid->kiennghi !!}</p>

   </div>


   <div class="ttsv" style="width: 100%; margin:0 auto; margin-top:50px; margin-bottom: 30px; margin-bottom: 270px;" >

    <table>
      <thead>
        <tr>
          <th style="width: 30%;">Đại điện cán bộ thực hiện</th>
          <th style="width: 30%;">Chủ nhiệm dự án</th>
          <th style="width: 30%;">Đại diện cán bộ nghiệm thu</th>
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


