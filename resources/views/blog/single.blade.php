@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag")

@section('stylesheets')

    @vite(['public/css/parsley.css', 'resources/css/app.css'])
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

@endsection

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
        <div class="col-md-8 col-md-offset-2">
            <h4 class="comments-title">
                <span class="glyphicon glyphicon-comment"></span>{{$post->comments()->count()}}  Comments</h4>
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ 'https://gravatar.com/avatar/' . md5(strtolower(trim($comment->email))) . "?d=mm" }}" class="author-image">

                        <div class="author-name">
                            <h5>{{$comment->name}}</h5>
                            <p class="author-time">{{ $comment->created_at->format('F j, Y, g:i a') }}</p>

                        </div>
                    </div>
                    
                    <div class="comment-content">
                        {{$comment->comment}}
                    </div>

                </div>
            @endforeach
        </div>
    </div>


    <div class="row">
    <div class="container mt-5">
        <div id="comment-form">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control" name="comment" id="comment" class="form-control" rows="9">{{ old('comment') }}</textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark mx-auto">Add Comment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection