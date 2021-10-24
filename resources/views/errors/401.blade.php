

 @extends('khoangsan.layout')

@section("content12")


  

          <div class="error-page" style="margin-top: 100px;">
            <h2 class="headline text-red">500</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-red"></i> Bạn không có quyền ở chức năng này</h3>
              <p>

                Bạn vui lòng liên hệ với quản trị viên để biết thêm thông tin chi tiết, quay về 
                 <a href="{{route('wp_admin')}}">Trang chủ</a> hoặc tìm kiếm trợ giúp thông tin tại đây.
              </p>
              <form class="search-form">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search" />
                  <div class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i></button>
                  </div>
                </div><!-- /.input-group -->
              </form>
            </div>
          </div><!-- /.error-page -->

    

  @endsection