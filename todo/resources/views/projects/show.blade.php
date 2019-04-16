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
		@if($project->tasks->count())
		<div class="field">
			@foreach ($project->tasks as $task)
			<p class="control">
				<div class="b-checkbox is-info is-circular">
					<input id="checkbox" class="styled" type="checkbox">
					<label for="checkbox">
						{{$task->name}}
					</label>
				</div>
			</p>
			@endforeach
		</div>
		@else
		<div class="field">
			<p class="is-size-6 has-text-weight-bold">No Tasks yet .</p>
		</div>
		@endif
		<div class="field">
			<form action="{{ route('tasks.store') }}" method="POST">
				@csrf
				<input type="hidden" name="projectId" value="{{$project->id}}">
				<p class="control has-icons-left has-icons-right is-inline">
					<input class="input" type="text" name="name" placeholder="New Task ?" style="max-width: 90%;">
					<span class="icon is-small is-left">
						<i class="fas fa-tasks"></i>
					</span>
				</p>
				<button type="submit" class="button is-inline"><i class="fas fa-plus"></i></button>
			</form>

		</div>
	</div>
</div>

@endsection