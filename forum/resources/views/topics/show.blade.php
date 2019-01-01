@extends('layouts.forum')

@section('content')
    <br>
    <a href="/assignment-1-laravel-Alexjs95/forum/public/topics" class="btn btn-secondary">Back to topics</a>
    
    <a href="/assignment-1-laravel-Alexjs95/forum/public/topics/{{$topic->id}}/edit" class="btn btn-secondary"> Edit topic</a>
    {!!Form::open(['action' => ['TopicController@destroy', $topic->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete topic', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    <br><br>
    <h1>{{$topic->title}}</h1>
    
        <h4>{!!$topic->body!!}</h4>      <!-- double !! to parse html --> 
  
    <br><br>
    <a href="/assignment-1-laravel-Alexjs95/forum/public/topicposts/create/{{$topic->id}}" class="btn btn-secondary">Add new post to topic</a>
    <br><br>


    @if (count($posts) > 0) 
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                <h4>{!!$post->body!!}</h4>
                <small>added on {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
            <br>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found<p>
    @endif


    <hr><small>Topic created on {{$topic->created_at}} by {{$topic->user->name}}</small>

@endSection