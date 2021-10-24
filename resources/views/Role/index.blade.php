@extends('administrator.payper')

@section("content")

<div class="container" style="margin-left: 20px; margin-top: 20px;margin-bottom: 20px;">
  <div class="row">
    <div class="row" style="margin-bottom: 20px;" >
      <div class="col-md-12">
        <a href="{{route('role_add')}}" class="btn btn-outline-warning">ADD</a>
      </div>
    </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">ACTOSION</th>

    </tr>
  </thead>
  <tbody>
    @foreach($role as $r)
    <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$r->id}}</td>
      <td>{{$r->name}}</td>
  
     <td>

      <a class="btn btn-primary btn-sm">Edit</a>
      <a href="{{route('role_dele',[$r->id])}}" class="btn btn-danger btn-sm">Delete</a>
     </td>
    </tr>
    @endforeach
 
  </tbody>
</table>
    
  </div>
  
</div>

@endsection
