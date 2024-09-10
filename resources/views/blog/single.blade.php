@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag")

@section('content')

    <div class="row">
        <div class="col-md-8 col-offset-md-2">
            <h1>{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <hr>
            <p class="text-muted">Posted In: <strong>{{ $post-> category->name}}</strong></p>

        </div>
    </div>

    <div class="row">
        <div id="comment-form">
            {{Form::open{{}}}}
        </div>
    </div>

@endsection