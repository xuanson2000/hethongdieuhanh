
@extends('administrator.payper')

@section('content')
<div class="container">
	<div class="row">

<form class="col-md-8" method="post" action="">
	 @csrf
  
  <div class="form-group">
    <label for="name">Họ tên </label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter name" name="name">
  </div>
  <div class="form-group">
    <label for="email">Tài khoản</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Email" name="username">
  <div class="form-group">
    <label for="password">Mật khẩu</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="password">
  </div>
  <div class="form-group">
    <label for="password">Xác nhận mật khẩu</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="com_password">
  </div>
  <div class="form-group">

  <select class="custom-select col-md-8" name="roles[]" multiple="multiple" style="height:80px;" >
  	<option selected>Choose...</option>
  	@foreach($role as $r)
  	
  	<option value="{{$r->id}}">{{$r->name}}</option>
  	
  	@endforeach
  </select>  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
	
</div>
@endsection

