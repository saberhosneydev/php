@extends('layout')

@section('content')
<div class="row">
	<div class="col"></div>
	<div class="col-8">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="/category/{{$post->category}}">{{$post->category}}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
			</ol>
		</nav>
	</div>
	<div class="col"></div>
</div>

<div class="row">
	<div class="col"></div>
	<div class="col-8">
		<h1>{{$post->title}}</h1>
		<h3>{{ $post->user->name }}</h3>
		<p>{{$post->body}}</p>
	</div>
	<div class="col"></div>
</div>


<div class="row">
	<div class="col"></div>
	<div class="col-8 card-body">
		@foreach($post->comments as $comment)
		<div class="media">
			<div class="media-body">
				<h5 class="mt-0">{{$comment->user->name}}</h5>
				<small class="mt-0">{{$comment->created_at->diffForHumans()}}</small><br>
				<b>{{ $comment->body }}</b>
			</div>
		</div>
		<hr />
		@endforeach
		<form method="POST" action="/posts/{{$post->slug}}/comments">
			{{csrf_field()}}
			<div class="form-group">
				<textarea class="form-control" id="body" name="body" placeholder="Your Comment"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add comment</button>
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