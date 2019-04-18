@extends('layouts.projects')
@section('customHeader')
<link rel="stylesheet" href="{{ asset('/css/bulma-radio-checkbox.css') }}">
@endsection
@section('content')
{{-- <div class="columns">
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
</div> --}}
<div class="columns">
	<div class="column is-10 is-offset-1">
		<div class="field">
			<nav class="breadcrumb" aria-label="breadcrumbs">
				<ul>
					<li><a href="/">{{ config('app.name') }}</a></li>
					<li><a href="/home">Home</a></li>
					<li><a href="/home/projects">Projects</a></li>
					<li class="is-active"><a href="/home/projects">{{$project->name}}</a></li>
				</ul>
			</nav>
		</div>
		@foreach($project->boards as $board)
		<div class="box has-background-white-ter" style="width: 33%;display: inline-block;">
			<div class="content">
				<p class="title">{{$board->name}}</p>
				@if($board->tasks->count())
				@foreach($board->tasks as $task)
				<div class="box has-ribbon">
					@if($task->priorty === "Normal")
					<div class="ribbon is-info">{{$task->priorty}}</div>
					@elseif($task->priorty === "Need Focus")
					<div class="ribbon is-warning">{{$task->priorty}}</div>
					@else
					<div class="ribbon is-danger">{{$task->priorty}}</div>
					@endif
					<div class="content">
						<div class="field" style="margin-top: 15px;">
							<input class="is-checkradio  is-large" id="{{$task->id}}" type="checkbox"  {{ $task->completed === 1 ? "checked" : "" }}>
							<label for="{{$task->id}}" style="font-size: 1.4rem;">{{$task->name}}</label>
						</div>

					</div>
					<nav class="level is-mobile">
						<a class="level-item" aria-label="reply">
							<span class="icon is-small">
								<i class="fas fa-trash" aria-hidden="true"></i>
							</span>
						</a>
						<a class="level-item" aria-label="retweet">
							<span class="icon is-small">
								<i class="fas fa-retweet" aria-hidden="true"></i>
							</span>
						</a>
						<a class="level-item" aria-label="like">
							<span class="icon is-small">
								<i class="fas fa-heart" aria-hidden="true"></i>
							</span>
						</a>
					</nav>
				</div>
				@endforeach
				@endif
				<div class="box">
					<div class="content">
						<form action="{{route('tasks.store')}}" method="POST">
							@csrf
							<input type="hidden" name="boardId" value="{{$board->id}}">
							<input type="hidden" name="projectId" value="{{$board->project->id}}">
							<div class="field">
								<input type="text" class="input" name="name" placeholder="task detail">
							</div>
							<div class="field" style="padding-left: 5px;">
								<label class="is-inline has-text-weight-bold" for="prior"  style="position:relative;top: 5px;margin-right: 25px;left: 2px;">Priorty : </label>
								<div class="control has-icons-left is-inline">
									<div class="select">
										<select id="prior" name="priorty">
											<option selected class="has-text-info">Normal</option>
											<option class="has-text-warning">Need Focus</option>
											<option class="has-text-danger">Emergeny</option>
										</select>
									</div>
									<span class="icon is-small is-left">
										<i class="fas fa-exclamation"></i>
									</span>
								</div>

							</div>
							<div class="field">
								<input class="is-checkradio" id="taskCompleted{{$board->id}}" type="checkbox" name="taskCompleted">
								<label for="taskCompleted{{$board->id}}">Is task completed ?</label>
							</div>
							<div class="field">
								<button class="button" style="width: 100%;">Create</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		@endforeach
		<form action="{{route('boards.store')}}" method="POST">
			@csrf
			<input type="hidden" name="projectId" value="{{$project->id}}">
			<input class="input" type="text" name="name" placeholder="New board ?" style="width: 50%;">
			<button class="button">Submit</button>
		</form>
	</div>

</div>
@endsection