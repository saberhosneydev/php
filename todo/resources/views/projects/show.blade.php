@extends('layouts.projects')
@section('customHeader')
<link rel="stylesheet" href="{{ asset('/css/bulma-radio-checkbox.css') }}">
@endsection
@section('content')
<div class="columns">
	<div class="column is-half is-offset-3">
		<nav class="breadcrumb" aria-label="breadcrumbs">
			<ul>
				<li><a href="/">{{ config('app.name') }}</a></li>
				<li><a href="/home">Home</a></li>
				<li><a href="/home/projects">Projects</a></li>
				<li class="is-active"><a href="#" aria-current="page">{{$project->name}}</a></li>
			</ul>
		</nav>
		<div class="field">
			<p class="is-size-2">{{$project->name}}</p>
			<p class="is-inline">By <span class="has-text-weight-bold">{{$project->user->name}} </span>at <span class="has-text-weight-bold">{{$project->from_date}}</span></p>
		</div>
		{{-- @if($project->tasks->count()) --}}
		<div class="field">
			<p class="control">
				<div class="b-checkbox is-info is-circular">
					<input id="checkbox" class="styled" checked type="checkbox">
					<label for="checkbox">
						Is Warning
					</label>
				</div>
			</p>
			<p class="control">
				<div class="b-checkbox is-info is-circular">
					<input id="checkbox" class="styled" checked type="checkbox">
					<label for="checkbox">
						Is Warning
					</label>
				</div>
			</p>
			<p class="control">
				<div class="b-checkbox is-info is-circular">
					<input id="checkbox" class="styled" type="checkbox">
					<label for="checkbox">
						Is Warning
					</label>
				</div>
			</p>
		</div>
		{{-- @endif --}}
	</div>
</div>

@endsection