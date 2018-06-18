@extends('layout')


@section('content')
<div class="row">
	<div class="col"></div>
	<div class="col-6">
		<h2>Create a new post !</h2>
		<form method="POST" action="/posts">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title">
			</div>
			<div class="form-group">
				<label for="body">Body</label>
				<textarea class="form-control" id="body" name="body"></textarea>
			</div>
			<div class="form-group">
				<label for="summary">summary</label>
				<input type="text" class="form-control" id="summary" name="summary">
			</div>
			<div class="form-group">
				<label for="category">category</label>
				<input type="text" class="form-control" id="category" name="category">
			</div>
			<div class="form-group">
				<label for="image">image</label>
				<input type="text" class="form-control" id="image" name="image">
			</div>
			<div class="form-group">
				<select class="custom-select" id="hot" name="hot">
				<option value="0" selected>No</option>
				<option value="1">Yes</option>	
			</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Create</button>
			</div>
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