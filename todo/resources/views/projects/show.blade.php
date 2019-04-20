@extends('layouts.projects')
@section('customHeader')
<link rel="stylesheet" href="{{ asset('/css/bulma-radio-checkbox.css') }}">
@endsection
@section('content')
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
				<p class="title is-marginless">
					{{$board->name}}
					<nav class="level is-mobile">
						<div class="level-left">
							<form action="/home/boards/{{$board->id}}" method="POST" id="deleteBoard{{$board->id}}" >
								@csrf
								@method('DELETE')
								<a class="level-item" aria-label="reply" onclick="document.getElementById('deleteBoard' + {{$board->id}}).submit()">
									<span class="icon is-small">
										<i class="fas fa-trash" aria-hidden="true"></i>
									</span>
								</a>
							</form>
							<form action="" style="margin-left: 35px;">
								<a class="level-item" aria-label="retweet">
									<span class="icon is-small boardupdateid" id="{{$board->id}}">
										<i class="far fa-edit" aria-hidden="true"></i>
									</span>
								</a>
							</form>
						</div>
					</nav>
				</p>
				<div class="field">
					<form action="/home/boards/{{$board->id}}" method="POST" id="BoardUpdate{{$board->id}}" style="display: none;">
						@csrf
						@method('PATCH')
						<input class="input is-inline" type="text" placeholder="Edit task detail" name="boardEdit" style="width: 65%;">
						<button class="button" class="is-inline">Update</button>
					</form>
				</div>
				<div class="field">
			@if ($errors->any())
			<div class="is-danger">
					@foreach ($errors->all() as $error)
					<div class="notification is-danger">
						<button class="delete"></button>
						{{$error}}
					</div>
					@endforeach
			</div>
			@endif
		</div>
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
							<div class="field">
								<form action="{{route('tasks.completed')}}" method="POST">
									@csrf
									@method('PATCH')
									<input type="hidden" name="taskId" value="{{$task->id}}">
									<input class="is-checkradio  is-large" id="{{$task->id}}" type="checkbox"  {{ $task->completed === 1 ? "checked" : "" }} name="completed" onchange="this.form.submit()">
									<label for="{{$task->id}}" style="font-size: 1.4rem;{{ $task->completed === 1 ? "text-decoration: line-through;" : "" }}">{{$task->name}}</label>
								</form>
							</div>

							<div class="field">
								<form action="/home/tasks/{{$task->id}}" method="POST" id="TaskUpdate{{$task->id}}" style="display: none;">
									@csrf
									@method('PATCH')
									<input class="input is-inline" type="text" placeholder="Edit task detail" name="taskEdit" style="width: 65%;">
									<button class="button" class="is-inline">Update</button>
								</form>
							</div>
						</div>

					</div>
					<nav class="level is-mobile">
						<form action="/home/tasks/{{$task->id}}" method="POST" id="deleteTask{{$task->id}}">
							@csrf
							@method('DELETE')
							<a class="level-item" aria-label="reply" onclick="document.getElementById('deleteTask' + {{$task->id}}).submit()">
								<span class="icon is-small">
									<i class="fas fa-trash" aria-hidden="true"></i>
								</span>
							</a>
						</form>
						<form action="">
							<a class="level-item" aria-label="retweet">
								<span class="icon is-small taskupdateid" id="{{$task->id}}">
									<i class="far fa-edit" aria-hidden="true"></i>
								</span>
							</a>
						</form>
						<form action="">
							<a class="level-item" aria-label="like">
								<span class="icon is-small tooltip" data-tooltip="Not functional yet .">
									<i class="fas fa-heart" aria-hidden="true"></i>
								</span>
							</a>
						</form>


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
		<form action="/home/projects/{{$project->id}}" method="POST">
			@csrf
			@method('DELETE')
			<button class="button tooltip is-tooltip-active is-tooltip-right" data-tooltip="this action is irreversible !">Delete project</button>
		</form>
	</div>

</div>
@endsection

@section('customFooter')
<script>
	$(document).ready(function(){

		$('.taskupdateid').click(function(){
			var id = $(this).attr('id');
			var formId = "TaskUpdate" + id;
			$('#'+ formId).css('display','block');
		});
		$('.boardupdateid').click(function(){
			var id = $(this).attr('id');
			var formId = "BoardUpdate" + id;
			$('#'+ formId).css('display','block');
		});
		$('.delete').click(function(){
			$('.notification').css("display", "none");
		});
	});
</script>
@endsection