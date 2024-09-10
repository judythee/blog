@extends('main')     

@section('title', '| Homepage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center" style="background-color: #f8f9fa; padding: 50px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-top: 15px;">
                <h1 class="display-4" style="color: #007bff;">Welcome to My Blog!!</h1>
                <p class="lead" style="font-size: 1.25rem; color: #6c757d;">Thank you for visiting. This is my test website built with Laravel. Please read my popular post!!</p>
                <a class="btn btn-primary btn-lg" href="#" role="button" style="background-color: #007bff; border-color: #007bff;">Popular Post</a>
            </div>
        </div>
    </div>
    {{-- end of header .row  --}}

    <br>

    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>

            @endforeach
        </div>

        <div class="col-md-3 offset-md-1">
            <h2>Sidebar</h2>
        </div>
    </div>
@endsection