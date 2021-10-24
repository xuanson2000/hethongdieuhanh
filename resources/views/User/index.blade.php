@extends('administrator.payper')

@section("content")

<div class="container" style="margin-left: 20px; margin-top: 20px;">
	<div class="row">
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-md-12">
				<a href="{{route('user_add')}}" class="btn btn-outline-warning">ADD</a>

			</div>
		</div>

		<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Họ tên </th>
      <th scope="col">Tài khoản</th>
      <th scope="col">Thao tác</th>

    </tr>
  </thead>
  <tbody>
  	@foreach($user as $u)
    <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$u->name}}</td>
      <td>{{$u->email}}</td>
  
     <td>

     	<a class="btn btn-primary btn-sm">Edit</a>
     	<a href="{{route('user_dele',[$u->id])}}" class="btn btn-danger btn-sm">Delete</a>
     </td>
    </tr>
    @endforeach
 
  </tbody>
</table>
		
	</div>
	
</div>







@endsection
