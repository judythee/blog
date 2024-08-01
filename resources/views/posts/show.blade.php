@extends('main')

@section('title', '| View Post')

@section('content')
<div class="row" >
    <div class="col-md-8">
        <h1 class="display-4">{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
    </div>

    <div class="col-md-4">
        <div class="card" style="background-color: rgb(236, 236, 236)">
            <div class="card-body text-center">
                <dl class="row justify-content-center">
                    <dt class="col-sm-4">Created At:</dt>
                    <dd class="col-sm-8">{{ $post->created_at->format('F d, Y h:i A') }}</dd>
                </dl>

                <dl class="row justify-content-center">
                    <dt class="col-sm-4">Last Updated:</dt>
                    <dd class="col-sm-8">{{ $post->updated_at->format('F d, Y h:i A') }}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6 mb-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-lg w-100">Edit</a>
                    </div>

                    <div class="col-sm-6 mb-2">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg w-100">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

