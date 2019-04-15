@extends('layouts.projects')

@section('content')
<div class="columns">
	<div class="column is-half is-offset-3">
		<nav class="breadcrumb" aria-label="breadcrumbs">
			<ul>
				<li><a href="/">{{ config('app.name') }}</a></li>
				<li><a href="/home">Home</a></li>
				<li class="is-active"><a href="/home/projects">Projects</a></li>
			</ul>
		</nav>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Created at</th>
				</tr>
			</thead>
			<tbody>
				@foreach (Auth::user()->projects as $project)
				<tr>
					<th>{{$project->id}}</th>
					<th><a href="/home/projects/{{$project->id}}">{{$project->name}}</a></th>
					<th>{{$project->from_date}}</th>
				</tr>
				@endforeach
			</tbody>
		</table>
		<a href="/home/projects/create" class="button">Create a new project</a>
	</div>
</div>



@endsection