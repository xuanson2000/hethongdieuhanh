  <aside class="main-sidebar" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="public/anh/{{Auth::guard('quantri')->user()->anh}}" class="img-circle" alt="User Image" />
            </div>

            <div class="pull-left info">
              @if(Auth::guard('quantri')->check())
              <p>{{Auth::guard('quantri')->user()->namclass}} </p>
              <a href="public/admin2/#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
              @endif
            </div>


          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Tìm kiếm ...." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>

           @if(Auth::guard('quantri')->user()->chuyengia !=0)
   
          <ul class="sidebar-menu">
          
<!--            <li class="treeview">
            <a href="">
              <i class="fa fa-cog"></i> <span>CẬP NHẬT HỆ THỐNG</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-caret-right" aria-hidden="true"></i> Hạng mục công việc (c1)</a></li>

              <li><a href="{{route('hmcvc2')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>   Hạng mục công việc (c2)</a> </li>
              <li><a href="{{route('hmcvc3')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>  Hạng mục công việc (c3)</a> </li>
              <li><a href="{{route('hmcvc4')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>   Hạng mục công việc (c4)</a> </li>

            </ul>
          </li> -->



        
            <li class="treeview">
              <a href="public/admin2/#">
              <i class="fa fa-list" aria-hidden="true"></i>
                <span> QUẢN LÝ KẾ HOẠCH</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('nhiemvuchuyenmuon')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Nhiệm vụ chuyên môn</a></li>
               <!--  <li><a href="{{route('nguoidung')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Đề tài NCKH</a></li>
                 <li><a href="{{route('nguoidung')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Dư án đầu tư</a></li> -->
                

              </ul>
            </li>


            <li class="treeview">
              <a href="public/admin2/#">
             <i class="fa fa-line-chart" aria-hidden="true"></i>
               <span> KIỂM TRA NGHIỆM THU</span>
               <i class="fa fa-angle-left pull-right"></i>
             </a>
              <ul class="treeview-menu">
                <li><a href="{{route('nhiemvuchuyenmonnghiemthu')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Nhiệm vụ chuyên môn</a></li>
               <!--  <li><a href="{{route('nguoidung')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Đề tài NCKH</a></li>
                <li><a href="{{route('nguoidung')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Dư án đầu tư</a></li> -->
                

              </ul>
            </li>




   
              <li class="treeview">
              <a href="public/admin2/#">
              <i class="fa fa-users" aria-hidden="true"></i>
                <span> QUẢN TRỊ NGƯỜI DÙNG</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('nguoidung')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Tạo tài khoản CBNT</a></li>
               <!--  <li><a href="{{route('vaitro')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Cập nhật vai trò </a></li> -->
               
              </ul>
            </li>

         

             
           <?php 
           $today = date("d-m-Y H:i:s");
            ?>
            <li style="font-size: 15px; color: #07F41E;" class="header">Hôm nay: {{$today}}</li>
         
          </ul>
          @endif
        </section>
    
      </aside>