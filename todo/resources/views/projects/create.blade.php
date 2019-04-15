@extends('layouts.projects')

@section('content')
<div class="columns">
	<div class="column is-half is-offset-3">
		<nav class="breadcrumb" aria-label="breadcrumbs">
			<ul>
				<li><a href="/">{{ config('app.name') }}</a></li>
				<li><a href="/home">Home</a></li>
				<li><a href="/home/projects">Projects</a></li>
				<li class="is-active"><a href="#" aria-current="page">Create</a></li>
			</ul>
		</nav>
		<form action="{{ route('projects.store') }}" method="POST">
			@csrf
			<div class="field">
				<input class="input" name="name" type="text" placeholder="Project Name">
			</div>
			<div class="field">
				<button class="button is-info">
				Create
			</button>
			</div>

		</form>

	</div>
</div>

@endsection