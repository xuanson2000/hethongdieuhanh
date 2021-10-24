@extends('administrator.payper')

@section("content")



<div class="container">
	<div class="row">

		<form class="col-md-8" method="post" action="">
			@csrf

			<div class="form-group">
				<label for="name">name</label>
				<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter name" name="name">
			</div>
			<div class="form-group">
				<label for="email">name_display</label>
				<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter name_display" name="display_name">

			</div>

			<div class="row"> <h5 style="padding-left:13px; padding-bottom: 20px;"> Quyền </h5></div>

			@foreach($pre as $p)

			<div class="checkbox">
				<label class="form-check-label" for="check1">
					<input type="checkbox" class="form-check-input" id="check1" name="prime[]" value="{{$p->id}}">{{$p->name}}
				</label>
			</div>

			@endforeach

			


			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

	</div>
	
</div>
@endsection