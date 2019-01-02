@extends('layouts.forum')

@section('content')
    <br>
    <h1>Topics</h1>

    {!! Form::open(['action' => 'TopicController@filter', 'method' => 'GET']) !!}
    
        <div class="form-group">
            {{ Form::label('date', 'Filter between two dates:')}}
            {{ Form::text('start', '', array('id' => 'datepicker1')) }}
            {{ Form::text('end', '', array('id' => 'datepicker2')) }}
            {{ Form::submit('filter topics', ['class' => 'btn btn-primary'])}}

        </div>

    {!! Form::close() !!}   

    @if (count($topics) > 0) 
        @foreach ($topics as $topic)
            <div class="card card-body bg-light">
                <h4><a href="/assignment-1-laravel-Alexjs95/forum/public/topics/{{$topic->id}}">{{$topic->title}}</a></h4>
                <small>created on {{$topic->created_at}} by {{$topic->user->name}}</small>
            </div>
            <br>
        @endforeach
        {{$topics->links()}}
    @else
        <p>No topics found<p>
    @endif
@endSection