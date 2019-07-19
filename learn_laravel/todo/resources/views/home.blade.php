@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Your Tasks!
                </div>
                @foreach(Auth::user()->tasks as $task)
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <form method="POST" action="/home/{{ $task->id }}/destroy">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </form>
                        <form action="/home/{{ $task->id }}/update" method="POST">
                            <input type="text" id="name" value="{{ $task->name }}">

                        </form>

                        <br>
                        {{ $task->desc }}<br>
                        {{ $task->created_at }}<br>
                    </div>
                </div>
                @endforeach
                <a href="/home/create" class="btn btn-info">Create a new task</a>
            </div>
        </div>
    </div>
</div>
@endsection
