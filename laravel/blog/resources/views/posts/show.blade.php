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
	<div class="co-8">
		<h1>{{$post->title}}</h1>
		<p>{{$post->body}}</p>
	</div>
	<div class="col"></div>
</div>

<div class="row">
	<div class="col"></div>
	<div class="col-6">
		@foreach($post->comments as $comment)
		<div class="media">
			<div class="media-body">
				<h5 class="mt-0">UserName</h5>
				<small class="mt-0">{{$comment->created_at->diffForHumans()}}</small><br>
				<b>{{ $comment->body }}</b>
			</div>
		</div>
		<br>
		@endforeach
	</div>
	<div class="col"></div>
</div>
@endsection