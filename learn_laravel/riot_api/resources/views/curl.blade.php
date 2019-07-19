@extends('lay')

@section('content')
<div class="row">
	<div class="col"></div>
	<div class="col-8">
	  	<table class="table">
		<thead>
			<tr>
				<th>Summoner</th>
				<th>Level</th>
				<th>Icon</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$con->name}}</td>
				<td>{{$con->summonerLevel}}</td>
				<td><img src="http://ddragon.leagueoflegends.com/cdn/8.11.1/img/profileicon/{{$con->profileIconId}}.png" alt=""></td>
			</tr>
		</tbody>
	</table>
	</div>
	<div class="col"></div>
</div>
	
@endsection