@extends('layouts.projects')

@section('content')
<div class="columns">
	<div class="column is-8 is-offset-2">
		<nav class="breadcrumb" aria-label="breadcrumbs">
			<ul>
				<li><a href="/">{{ config('app.name') }}</a></li>
				<li><a href="/home">Home</a></li>
				<li class="is-active"><a href="/home/projects">Projects</a></li>
			</ul>
		</nav>

		<div class="field">
			@foreach (Auth::user()->projects as $project)
			<a href="/home/projects/{{$project->id}}">
				<div class="card" style="width: 24%; display: inline-block;background: #e74c3c;margin-bottom: 4px;">
					<div class="card-image">
						<figure class="image">
							<img src="{{asset('/imgs/list.svg')}}" alt="Placeholder image" width="48" height="48" class="lelo">
						</figure>
					</div>
					<div class="card-content">
						<p class="title is-5 has-text-white	">{{$project->name}}</p>
						<p class="subtitle is-6 has-text-weight-light">By {{$project->user->name}}</p>
					</div>
				</div>
			</a>
			@endforeach
			<a href="/home/projects/create">
				<div class="card" style="width: 24%; display: inline-block;background: #e74c3c; margin-bottom: 4px;">
					<div class="card-content has-text-centered">
						<i class="fa fa-6x fa-plus" style="color: #fbb351;"></i>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>


@endsection