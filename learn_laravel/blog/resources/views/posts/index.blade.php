@extends('layout')

@section('content')
		<div class="card flex-md-row mb-4 box-shadow h-md-250 bg-dark text-white">
			<div class="card-body d-flex flex-column align-items-start">
				<strong class="d-inline-block mb-2 text-primary">{{$hotpost->category}}</strong>
				<h3 class="mb-0">
					<a class="text-white" href="/posts/{{ $hotpost->slug }}">{{ $hotpost->title }}</a>
				</h3>
				<div class="mb-1 text-white">{{$hotpost->created_at->toFormattedDateString()}}</div>
				<p class="card-text mb-auto">{{$hotpost->summary}}</p>
				<a href="/posts/{{ $hotpost->slug }}">Continue reading</a>
			</div>
			<img class="card-img-right flex-auto d-none d-lg-block" src="{{ $hotpost->image }}" width="600" height="250">
		</div>
<div class="row mb-2">
	@foreach ($posts as $post)
	<div class="col-md-6">
		<div class="card flex-md-row mb-4 box-shadow h-md-250">
			<div class="card-body d-flex flex-column align-items-start">
				<strong class="d-inline-block mb-2 text-primary">{{$post->category}}</strong>
				<h3 class="mb-0">
					<a class="text-dark" href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
				</h3>
				<div class="mb-1 text-muted">{{$post->created_at->toFormattedDateString()}}</div>
				<p class="card-text mb-auto">{{$post->summary}}</p>
				<a href="/posts/{{ $post->slug }}">Continue reading</a>
			</div>
			<img class="card-img-right flex-auto d-none d-lg-block" src="{{ $post->image }}" width="200" height="250">
		</div>
	</div>
	@endforeach
</div>
@endsection