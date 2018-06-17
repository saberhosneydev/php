@extends('layout')

@section('content')
@foreach ($cats as $category)
<a class="btn btn-primary" href="/category/{{$category}}">
	{{$category}}
	 <span class="badge badge-light">{{App\Post::countCat($category)}}</span>
</a>
@endforeach
@endsection