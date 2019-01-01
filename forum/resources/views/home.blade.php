@extends('layouts.forum')

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
                    <a href="/assignment-1-laravel-Alexjs95/forum/public/topics/create" class="btn btn-primary"> Create topic</a>
                    <h3> Owned topics </h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
