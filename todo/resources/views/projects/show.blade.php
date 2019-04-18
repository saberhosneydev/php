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

	</div>
</div>
<div class="columns">
	<div class="column is-half is-offset-3">
		@if($project->boards->count())
		@foreach ($project->boards as $board)
		<div class="card">
			<div class="card-header">
				<p class="card-header-title is-centered">
					{{$board->name}}
				</p>
				<form action="/home/boards/{{ $board->id }}" method="POST">
					@method('DELETE')
					@csrf
					<input type="hidden" name="projectId" value="{{ $project->id }}">
					<button class="delete" style="top: 12px;right: 12px;"></button>
				</form>

			</div>
			<div class="card-content">
				<p class="title">
					@if($board->tasks->count())
					<div class="field">
						@foreach ($board->tasks as $task)
						<p class="control">
							<div class="b-checkbox is-danger is-circular">
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
				</p>
			</div>
			<footer class="card-footer">
				<div class="field card-footer-item" style="display: inline-block;">
					<form action="{{ route('tasks.store') }}" method="POST">
						@csrf
						<input type="hidden" name="boardId" value="{{$board->id}}">
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
			</footer>
		</div>
		@endforeach
		@else
		<div class="field">
			<form action="{{ route('boards.store') }}" method="POST">
				@csrf
				<input type="hidden" name="projectId" value="{{$project->id}}">
				<p class="control has-icons-left has-icons-right is-inline">
					<input class="input" type="text" name="name" placeholder="New Board ?" style="max-width: 90%;">
					<span class="icon is-small is-left">
						<i class="fas fa-tasks"></i>
					</span>
				</p>
				<button type="submit" class="button is-inline"><i class="fas fa-plus"></i></button>
			</form>
		</div>
		@endif

		<form action="/home/projects/{{$project->id}}" method="POST">
			@csrf
			@method('DELETE')
			<button class="button">Delete the project ?</button>
		</form>
	</div>
</div>
@endsection