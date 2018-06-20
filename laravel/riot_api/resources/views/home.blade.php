@extends('lay')

@section('content')
<div class="row">
	<div class="col"></div>
	<div class="col-8">
	  	<table class="table">
		<thead>
			<tr>
				<th>Summoner</th>
				<th>Position</th>
				<th>Rank</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->position}}</td>
				<td>{{$user->rank}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
	<div class="col"></div>
</div>
	
@endsection