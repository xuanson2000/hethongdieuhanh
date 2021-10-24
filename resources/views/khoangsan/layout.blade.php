<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>HỆ THỐNG QUẢN TRỊ Dashboard</title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="{{asset('')}}"/> 

  
    <link href="public/css/font-awesome.css" rel="stylesheet" type="text/css" />

<!--     <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->

    <link rel="stylesheet" href="public/css/bootstrap1.css">

    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>

   

    <!-- Theme style -->
    <link href="public/admin2/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="public/admin2/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
    <link rel = "stylesheet" href = "public/leaflet.css"/>

    <script src = "public/js/leaflet.js"></script>
     

    <link href="public/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="public/js/tableseach.js"></script>

  
  
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper" >


     @include('khoangsan.header')

     <!-- Left side column. contains the logo and sidebar -->

     @include('khoangsan.menu')

     <!-- Content Wrapper. Contains page content -->
     


     <div class="content-wrapper" >
      <!-- Content Header (Page header) -->


        @yield('content12')

        
      </div><!-- /.content-wrapper -->



     
@include('khoangsan.footer')
      <!-- Control Sidebar -->

    </div><!-- ./wrapper -->

 
  
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
 
   
    
    <!-- AdminLTE App -->
    <script src="public/admin2/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  
   
   
  
    



    

    <script >
      
      function xacnhanxoa(msg){

        if(window.confirm(msg)){
          return true;

        }
        else

          return false;

      }
      function confirmAction() {
        return confirm("Thông báo?")
      }

    </script>

    @yield('script')
    @yield('script1')
      @yield('scriptseach')
 

  </body>
</html>
