@extends('main')

@section('title', '| Blog')

@section('content')

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h1>Blog</h1>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <h5 class="card-subtitle mb-2 text-muted">Published: {{ $post->created_at->format('M d, Y') }}</h5>
                        <p class="card-text">{{ Str::limit($post->body, 250) }}</p>
                        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Pagination Links --}}
    <div class="d-flex justify-content-center my-4">
        {{ $posts->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>

@endsection