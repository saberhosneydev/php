@extends('layout')

@section('content')
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="#">{{$post->category}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
  </ol>
</nav>
@endsection