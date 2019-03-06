@extends('layout')

@section('content')
    @foreach($tasks as $task)
        <div class="col-md-12 el">
            <div class="col-md-6">
                <img src="uploads/{{ $task->getImage() }}">
            </div>
                <div class="col-md-2">
                @if( $_SESSION['auth'] == 1 )
                    <a href="/task/delete/{{ $task->getId() }}">Delete</a>
                @endif
                </div>
            <div class="col-md-4">
                <p>Email: {{ $task->getEmail() }}</p>
                <p>Username: {{ $task->getUsername() }}</p>
                <p>Text: {{ $task->getBody() }}</p>
            </div>
        </div>
    @endforeach
    {!! $paginator !!}
@stop
