@extends('layouts.forum')

@section('content')
    <h1>Topics</h1>
    @if (count($topics) > 1) 
        @foreach ($topics as $topic)
            <div class="well">
                <h3>{{$topic->title}}</h3>
                <small>created on {{$topic->created_at}}</small>
            </div>
        @endforeach
    @else
        <p>No topics found<p>
    @endif
@endSection