@extends('lay')

@section('content')
	<div class="row">
		<div class="col"></div>
		<div class="col-6">
			<form method="POST" action="/create">
				{{csrf_field()}}
				<fieldset class="form-group">
					<label for="name">Summoner Name</label>
					<input type="text" class="form-control" name="name" placeholder="Name">
				</fieldset>
				<fieldset class="form-group">
					<label for="position">Summoner Position</label>
					<input type="text" class="form-control" name="position" placeholder="Position">
				</fieldset>
					<fieldset class="form-group">
						<label for="rank">Summoner Rank</label>
						<input type="text" class="form-control" name="rank" placeholder="Rank">
					</fieldset>

					<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="col"></div>
	</div>
@endsection