@extends('layouts.forum')

@section('content')
    <br>
    <h1>Topics</h1>
    @if (count($topics) > 0) 
        @foreach ($topics as $topic)
            <div class="card card-body bg-light">
                <h4><a href="/assignment-1-laravel-Alexjs95/forum/public/topics/{{$topic->id}}">{{$topic->title}}</a></h4>
                <small>created on {{$topic->created_at}}</small>
            </div>
            <br>
        @endforeach
        {{$topics->links()}}
    @else
        <p>No topics found<p>
    @endif
@endSection