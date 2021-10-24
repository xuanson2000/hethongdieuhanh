<?php


Route::get('/',[
  'as'=>'trungtamtatrangchu',
  'uses'=>'trungtamtatrangchu@trungtamtatrangchu'
]);



//dang nhap quan tri
Route::get('/dang-nhap',[
  'as'=>'dangnhap',
  'uses'=>'admincontroller@getdangnhap'
]);

Route::post('/dang-nhap',[
  'as'=>'dangnhappost',
  'uses'=>'admincontroller@postdangnhap'
]);
Route::get('/dang-nhap/{id}',[
  'as'=>'reset_dangnhap',
  'uses'=>'admincontroller@reset_dangnhap'
]);
Route::post('/dang-nhap/{id}',[
  'as'=>'reset_dangnhappost',
  'uses'=>'admincontroller@reset_dangnhappost'
]);
Route::get('/logut-dang-nhap',[
  'as'=>'logout-dang-nhap',
  'uses'=>'admincontroller@getlogoutdangnhap'
]);
//phân quan trị quyền
      




route::group(['prefix'=>'quan-tri','middleware'=>'Quantri'],function(){

  Route::get('/',[
    'as'=>'wp_admin',
    'uses'=>'controllerquantri@index',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  Route::get('/cap-nhat-hang-muc-cv-cap-2',[
    'as'=>'hmcvc2',
    'uses'=>'controllerCapnhathethong@hmcvc2',
    // 'middleware'=>'Checkquyen:khoang-san'
  ]);

    Route::get('/xoa-hang-muc-cv-cap-2/{id}',[
    'as'=>'xoahmcvc2',
    'uses'=>'controllerCapnhathethong@xoahmcvc2',
    // 'middleware'=>'Checkquyen:khoang-san'
  ]);


    Route::post('/them-hang-muc-cv-cap-2',[
    'as'=>'themhmcvc2',
    'uses'=>'controllerCapnhathethong@themhmcvc2',
    // 'middleware'=>'Checkquyen:khoang-san'
  ]);


  Route::get('/cap-nhat-hang-muc-cv-cap-3',[
    'as'=>'hmcvc3',
    'uses'=>'controllerCapnhathethong@hmcvc3',
    // 'middleware'=>'Checkquyen:khoang-san'
  ]);

  
  Route::get('/xoa-hang-muc-cv-cap-3/{id}',[
    'as'=>'xoahmcvc3',
    'uses'=>'controllerCapnhathethong@xoahmcvc3',
    // 'middleware'=>'Checkquyen:khoang-san'
  ]);


  Route::post('/them-hang-muc-cv-cap-3',[
    'as'=>'themhmcvc3',
    'uses'=>'controllerCapnhathethong@themhmcvc3',
    // 'middleware'=>'Checkquyen:khoang-san'
  ]);


  Route::get('/cap-nhat-hang-muc-cv-cap-4',[
    'as'=>'hmcvc4',
    'uses'=>'controllerCapnhathethong@hmcvc4',
    // 'middleware'=>'Checkquyen:khoang-san'
  ]);


  Route::get('/xoa-hang-muc-cv-cap-4/{id}',[
    'as'=>'xoahmcvc4',
    'uses'=>'controllerCapnhathethong@xoahmcvc4',
    // 'middleware'=>'Checkquyen:khoang-san'
  ]);

  
  Route::post('/them-hang-muc-cv-cap-4',[
    'as'=>'themhmcvc4',
    'uses'=>'controllerCapnhathethong@themhmcvc4',
    // 'middleware'=>'Checkquyen:khoang-san'
  ]);




  Route::get('/danh-sach-nhiem-vu-chuyen-mon',[
    'as'=>'nhiemvuchuyenmuon',
    'uses'=>'controllernhiemvuchuyenmon@nhiemvuchuyenmuon',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);




  Route::get('/chi-tiet-nhiem-vu-chuyen-mon/{id}',[
    'as'=>'chitietnhiemvu',
    'uses'=>'controllernhiemvuchuyenmon@chitietnhiemvu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  Route::post('/them-nhiem-vu-chuyen-mon',[
    'as'=>'themnhiemvuchuyenmon',
    'uses'=>'controllernhiemvuchuyenmon@themnhiemvuchuyenmon',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  Route::get('/xoa-nhiem-vu-chuyen-mon/{id}',[
    'as'=>'xoanhiemvu',
    'uses'=>'controllernhiemvuchuyenmon@xoanhiemvu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  

  Route::get('/sua-nhiem-vu-chuyen-mon/{id}',[
    'as'=>'suanhiemvu',
    'uses'=>'controllernhiemvuchuyenmon@suanhiemvu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);



    Route::post('/sua-nhiem-vu-chuyen-mon-post/{id}',[
    'as'=>'suanhiemvupost',
    'uses'=>'controllernhiemvuchuyenmon@suanhiemvupost',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);



  Route::get('/dieu-chinh-nhiem-vu-chuyen-mon/{id}',[
    'as'=>'dieuchinhnhiemvu',
    'uses'=>'controllernhiemvuchuyenmon@dieuchinhnhiemvu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

  

    Route::post('/dieu-chinh-nhiem-vu-chuyen-mon-post/{id}',[
    'as'=>'dieuchinhnhiemvupost',
    'uses'=>'controllernhiemvuchuyenmon@dieuchinhnhiemvupost',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);
  
  Route::get('/dat-hang-nhiem-vu-chuyen-mon/{id}',[
    'as'=>'dathang',
    'uses'=>'controllernhiemvuchuyenmon@dathang',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

  Route::post('/dat-hang-nhiem-vu-chuyen-mon-post/{id}',[
    'as'=>'dathangpost',
    'uses'=>'controllernhiemvuchuyenmon@dathangpost',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);



  Route::get('/xoa-dat-hang-nhiem-vu-chuyen-mon/{id}',[
    'as'=>'xoanhiemvudonvi',
    'uses'=>'controllernhiemvuchuyenmon@xoanhiemvudonvi',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

  
  Route::get('/xuat-hmcv/{id}',[
    'as'=>'xuatfilehmc',
    'uses'=>'controllernhiemvuchuyenmon@xuatfilehmc',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);



  Route::get('/dieu-chinh-dat-hang-nhiem-vu-chuyen-mon/{id}',[
    'as'=>'dieuchinhnhiemvudonvi',
    'uses'=>'controllernhiemvuchuyenmon@dieuchinhnhiemvudonvi',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  Route::post('/save-dieu-chinh-dat-hang-nhiem-vu-chuyen-mon/{id}',[
    'as'=>'savedieuchinhnhiemvudonvi',
    'uses'=>'controllernhiemvuchuyenmon@savedieuchinhnhiemvudonvi',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  Route::get('/nhiem-vu-chuyen-mon-nghiem-thu',[
    'as'=>'nhiemvuchuyenmonnghiemthu',
    'uses'=>'controllernhiemvuchuyenmon@nhiemvuchuyenmonnghiemthu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  Route::get('/chi-tiet-nhiem-vu-chuyen-mon-nghiem-thu/{id}',[
    'as'=>'chitietnghiemthu',
    'uses'=>'controllernhiemvuchuyenmon@chitietnghiemthu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

  Route::get('/chi-tiet-nhiem-vu-gia-trung-tam/{id}',[
    'as'=>'chitietnhiemvugiaott',
    'uses'=>'controllernhiemvuchuyenmon@chitietnhiemvugiaott',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

  Route::post('/them-nghiem-thu-cap-quan-ly/{id}',[
    'as'=>'themnghiemthucapthucapquanly',
    'uses'=>'controllernhiemvuchuyenmon@themnghiemthucapthucapquanly',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  Route::get('/xoa-hoi-dong-nghiem-thuquanly/{id}',[
    'as'=>'xoanghiemthuql',
    'uses'=>'controllernhiemvuchuyenmon@xoanghiemthuql',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  
  Route::get('/giao-hang-muc-cong-viec-nghiem-thu-quan-ly/{id_chuyengia}/{id_ntql}',[
    'as'=>'giaohmcvntql',
    'uses'=>'controllernhiemvuchuyenmon@giaohmcvntql',
    // 'middleware'=>'Checkquyen:tu_danh_gia'
  ]);

  Route::post('/save-giao-hang-muc-cong-viec-nghiem-thu-quan-ly/{loaint}/{id_chuyengia}/{id_nhiemvu_donvi}',[
    'as'=>'savegiaohmcvntql',
    'uses'=>'controllernhiemvuchuyenmon@savegiaohmcvntql',
    // 'middleware'=>'Checkquyen:tu_danh_gia'
  ]);







  Route::get('/trung-tam',[
    'as'=>'trangchutrungtam',
    'uses'=>'ControllerNhiemvutrungtam@trangchutrungtam',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

  
  Route::get('/danh-sach-nhiem-vu-chuyen-mon-don-vi',[
    'as'=>'nhiemvutt',
    'uses'=>'ControllerNhiemvutrungtam@nhiemvutt',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

  Route::post('/nhap-file-hang-muc-cong-viec/{id}',[
    'as'=>'importphuluctt',
    'uses'=>'ControllerNhiemvutrungtam@importphuluctt',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);
  

  

    Route::get('/chi-tiet-nhiem-vu-chuyen-mon-don-vi/{id}',[
    'as'=>'chitietnhiemvutt',
    'uses'=>'ControllerNhiemvutrungtam@chitietnhiemvutt',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);



    Route::get('/nghiem-thu-nhiem-vu-tt-co-so',[
    'as'=>'nhiemvuchuyenmonttnghiemthu',
    'uses'=>'ControllerNhiemvutrungtam@nhiemvuchuyenmonttnghiemthu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

    Route::get('/chi-tiet-nghiem-thu-nhiem-vu-tt-co-so/{id}',[
      'as'=>'chitietnghiemthutt',
      'uses'=>'ControllerNhiemvutrungtam@chitietnghiemthutt',
    // 'middleware'=>'Checkquyen:tu_danh_gia'
    ]);


 Route::post('/them-quyet-dinh-hoi-dong-nghiem-thucs/{id}',[
    'as'=>'nhapquyetdinhnghiemthucoso',
    'uses'=>'ControllerNhiemvutrungtam@nhapquyetdinhnghiemthucoso',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


 Route::get('/xoa-thanh-lap-nghiem-thu-co-so/{id}',[
  'as'=>'xoanghiemthucs',
  'uses'=>'ControllerNhiemvutrungtam@xoanghiemthucs',
    // 'middleware'=>'Checkquyen:tu_danh_gia'
]);



 Route::post('/de-nghi-nghiem-thu-cap-quan-ly/{id}',[
    'as'=>'denghinghiemthuquanly',
    'uses'=>'ControllerNhiemvutrungtam@denghinghiemthuquanly',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);



    Route::get('/giao-hang-muc-cong-viec-nghiem-thu/{id_chuyengia}/{id_ntcs}',[
      'as'=>'giaohmcvnt',
      'uses'=>'ControllerNhiemvutrungtam@giaohmcvnt',
    // 'middleware'=>'Checkquyen:tu_danh_gia'
    ]);

    Route::post('/save-giao-hang-muc-cong-viec-nghiem-thu/{loaint}/{id_chuyengia}/{id_nhiemvu_donvi}',[
      'as'=>'savegiaohmcvnt',
      'uses'=>'ControllerNhiemvutrungtam@savegiaohmcvnt',
    // 'middleware'=>'Checkquyen:tu_danh_gia'
    ]);

    


  // chuyên gia

   Route::get('/trang-chu-hoi-dong-nghiem-thu',[
      'as'=>'mainnghiemthu',
      'uses'=>'controllernghiemthu@mainnghiemthu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

    ]);

    Route::get('/hoi-dong-nghiem-thu',[
      'as'=>'nghiemthuindex',
      'uses'=>'controllernghiemthu@nghiemthuindex',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

    ]);


   Route::get('/chi-tiet-hoi-dong-nghiem-thu/{id}',[
      'as'=>'chitiethoidongnghiemthu',
      'uses'=>'controllernghiemthu@chitiethoidongnghiemthu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

    ]);



   Route::get('/tao-form-bien-ban-nghiem-thu/{id}/{loaint}/{id_ntcs}',[
    'as'=>'taoformbienbancs',
    'uses'=>'controllernghiemthu@taoformbienbancs',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


   Route::post('/save-tao-form-bien-ban-nghiem-thu/{id_ntcs}/{loaint}',[
    'as'=>'saveformbienban',
    'uses'=>'controllernghiemthu@saveformbienban',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

   
   Route::get('/tao-form-bien-ban-nghiem-thu-quan-ly/{id}/{loaint}/{id_ntql}',[
    'as'=>'taoformbienban',
    'uses'=>'controllernghiemthu@taoformbienban',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

   Route::post('/save-tao-form-bien-ban-nghiem-thu-quan-ly/{id_ntql}/{loaint}',[
    'as'=>'saveformbienbanql',
    'uses'=>'controllernghiemthu@saveformbienbanql',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);



   Route::get('/dieu-chinh-don-gia/{id_nhiemvu_donvi}/{loaint}',[
    'as'=>'dieuchinhdongiacs',
    'uses'=>'ControllerNhiemvutrungtam@dieuchinhdongiacs',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

      Route::post('/save-dieu-chinh-don-gia/{id_nhiemvu_donvi}/{loaint}',[
    'as'=>'savedieuchinhdongiacs',
    'uses'=>'ControllerNhiemvutrungtam@savedieuchinhdongiacs',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


      Route::get('/dieu-chinh-don-gia-quan-ly/{id_nhiemvu_donvi}/{loaint}',[
        'as'=>'dieuchinhdongiaql',
        'uses'=>'controllernhiemvuchuyenmon@dieuchinhdongiaql',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

      ]);


     Route::post('/save-dieu-chinh-don-gia-quan-ly/{id_nhiemvu_donvi}/{loaint}',[
        'as'=>'savedieuchinhdongiaql',
        'uses'=>'controllernhiemvuchuyenmon@savedieuchinhdongiaql',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

      ]);



   Route::get('/tao-form-bien-ban-nghiem-thu-co-so-tong-hop/{id}',[
    'as'=>'taobienbanthcsth',
    'uses'=>'controllernghiemthu@taobienbanthcsth',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


   Route::post('/save-tao-form-bien-ban-nghiem-thu-co-so-tong-hop/{id}',[
    'as'=>'savetaobienbanthcs',
    'uses'=>'controllernghiemthu@savetaobienbanthcs',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

   Route::get('/xuat-tao-form-bien-ban-nghiem-thu-co-so-tong-hop/{id}',[
    'as'=>'xuattaobienbanthcsth',
    'uses'=>'controllernghiemthu@xuattaobienbanthcsth',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


   Route::get('/tao-form-bien-ban-nghiem-thu-quan-ly-tong-hop/{id}',[
    'as'=>'taobienbanthqlth',
    'uses'=>'controllernghiemthu@taobienbanthqlth',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

   
   Route::post('/save-tao-form-bien-ban-nghiem-thu-quan-ly-tong-hop/{id}',[
    'as'=>'savetaobienbanthql',
    'uses'=>'controllernghiemthu@savetaobienbanthql',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  Route::get('/xuat-tao-form-bien-ban-nghiem-thu-quan-ly-tong-hop/{id}',[
    'as'=>'xuattaobienbanthqlth',
    'uses'=>'controllernghiemthu@xuattaobienbanthqlth',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


Route::post('/gui-bien-ban-nghiem-thu/{id}',[
  'as'=>'guibienbannghiemthu',
  'uses'=>'controllernghiemthu@guibienbannghiemthu',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

]);


   Route::get('/chi-tiet-hoi-dong-nghiem-thu-coso/{id}',[
      'as'=>'chitiethoidongnghiemthucs',
      'uses'=>'controllernghiemthu@chitiethoidongnghiemthucs',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

    ]);

 Route::post('/gui-bien-ban-nghiem-thu-cs/{id}',[
      'as'=>'guibienbannghiemthucoso',
      'uses'=>'controllernghiemthu@guibienbannghiemthucoso',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

    ]);

   Route::get('/gui-lai-bien-ban-cs/{id}',[
      'as'=>'guilaibienbancs',
      'uses'=>'controllernghiemthu@guilaibienbancs',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

    ]);

   Route::get('/gui-lai-bien-ban-ql/{id}',[
    'as'=>'guilaibienbanql',
    'uses'=>'controllernghiemthu@guilaibienbanql',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

   

  Route::get('/xuat-bien-ban-nghiem-thu-cs6t/{id}',[
    'as'=>'xuatbienbanntcs6t',
    'uses'=>'controllernghiemthu@xuatbienbanntcs6t',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


  Route::get('/xuat-bien-ban-nghiem-thu-cs12t/{id}',[
    'as'=>'xuatbienbanntcs12t',
    'uses'=>'controllernghiemthu@xuatbienbanntcs12t',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

   Route::get('/xuat-bien-ban-nghiem-thu-ql6t/{id}',[
    'as'=>'xuatbienbanntql6t',
    'uses'=>'controllernghiemthu@xuatbienbanntql6t',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);



   Route::get('/xuat-bien-ban-nghiem-thu-ql12t/{id}',[
    'as'=>'xuatbienbanntql12t',
    'uses'=>'controllernghiemthu@xuatbienbanntql12t',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


   Route::get('/thong-bao-gui-bien-ban-nghiem-thu',[
    'as'=>'thongbanguibienbannt',
    'uses'=>'controllernghiemthu@thongbanguibienbannt',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]); 


  

   Route::get('/tai-ve-phu-luc-cs/{id_nhiemvu_donvi}/{loaint}',[
    'as'=>'downloaddongiacs',
    'uses'=>'controllernghiemthu@downloaddongiacs',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);

   

      Route::get('/tai-ve-phu-luc-ql/{id_nhiemvu_donvi}/{loaint}',[
    'as'=>'downloaddongiaql',
    'uses'=>'controllernghiemthu@downloaddongiaql',
    // 'middleware'=>'Checkquyen:tu_danh_gia'

  ]);


/// quan trị phân quyền
Route::get('/vai-tro-quan-tri.html',[
    'as'=>'vaitro',
    'uses'=>'controllerquyen@index',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);

Route::post('/them-vai-tro-quan-tri.html',[
    'as'=>'themvaitro',
    'uses'=>'controllerquyen@themvaitro',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);

 Route::get('/xoa-vai-tro-quan-tri{id}',[
    'as'=>'xoavaitro',
    'uses'=>'controllerquyen@xoavaitro',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);


Route::get('/nguoi-dung.html',[
    'as'=>'nguoidung',
    'uses'=>'controllernguoidung@index',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);

Route::post('/them-nguoi-dung.html',[
    'as'=>'themnguoidung',
    'uses'=>'controllernguoidung@themnguoidung',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);



Route::get('/xoa-nguoi-dung/{id}',[
  'as'=>'xoanguoidung',
  'uses'=>'controllernguoidung@xoanguoidung',
 // 'middleware'=>'Checkquyen:tao_tai_khoan_quan_tri'
]);

Route::get('/sua-nguoi-dung/{id}',[
  'as'=>'suanguoidung',
  'uses'=>'controllernguoidung@suanguoidung',
  //  'middleware'=>'Checkquyen:tao_tai_khoan_quan_tri'
]);

Route::post('/sua-nguoi-dung-post/{id}',[
  'as'=>'suanguoidungpost',
  'uses'=>'controllernguoidung@suanguoidungpost',
    // 'middleware'=>'Checkquyen:tao_tai_khoan_quan_tri'
]);



Route::get('/tinh-toan-san-pham',[
    'as'=>'tinhtoan',
    'uses'=>'controllerTinhtoan@index',
    // 'middleware'=>'Checkquyen:xemSlide'
  ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
