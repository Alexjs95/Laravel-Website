@extends('layouts.forum')

@section('content')
    <br>
    <a href="/assignment-1-laravel-Alexjs95/forum/public/topics" class="btn btn-secondary">Back to topics</a>
    <br><br>
    <h1>{{$topic->title}}</h1>
    <div>
        {{$topic->body}}
    </div>
    <hr><small>Created on {{$topic->created_at}}</small>

@endSection