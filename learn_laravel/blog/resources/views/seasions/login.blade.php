@extends('layout')

@section('content')
<div class="row">
	<div class="col"></div>
<div class="col-6">
	<form method="POST" action="/login" class="card-body">
		{{csrf_field()}}
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" placeholder="Enter email">
			<small class="text-muted">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" placeholder="Enter password">
		</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	@foreach ($errors->all() as $error)
	<div class="alert alert-danger" role="alert">
		{{$error}}
	</div>
	@endforeach
</div>
<div class="col"></div>
</div>
@endsection
