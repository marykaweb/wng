@extends('layouts.index')

@section('title', $news->title)
@section('content')
    

    <div class="container">
        <div class="links">
            <div class="links links-top">
                <a href="{{ url('/') }}">На главную</a>
            </div>
        </div>
        <div class="row">
            <div class="card-post">
                <div class="card-date">{{$updated_at}}</div>
                <div class="card-author">{{$news->user->name}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1>{{$news->title}}</h1>
                <p>{!!$news->description!!}</p>
            </div>
        </div>
    </div>
@endsection