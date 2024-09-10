@extends('main')

@section('title', '| View Post')

@section('content')
<div class="row" >
    <div class="col-md-7 ">
        <h1 class="display-4">{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
    </div>
    <hr>

    <div></div>
        @foreach ($post->tags as $tag)
            <span class="label label-default">{{$tag->name}}</span>
        @endforeach
    </div>

    <div class="col-md-5">
        <div class="card shadow-lg border-0" style="background-color: rgb(243, 243, 243); margin-top: 20px">
            <div class="card-body text-center">
                <dl class="row justify-content-center">
                    <dt class="col-sm-4 text-sm-end">Url Slug:</dt>
                    <dd class="col-sm-8 text-sm-start"><a href="{{ route('blog.single', $post->slug)}}">{{ route('blog.single', $post->slug)}}</a></dd>
                </dl>
                <dl class="row justify-content-center">
                    <dt class="col-sm-4 text-sm-end">Category:</dt>
                    <dd class="col-sm-8 text-sm-start">{{ optional($post->category)->name ?? 'Uncategorized' }}</dd>
                </dl>
                <dl class="row justify-content-center">
                    <dt class="col-sm-4 text-sm-end">Created At:</dt>
                    <dd class="col-sm-8 text-sm-start">{{ $post->created_at->format('F d, Y h:i A') }}</dd>
                </dl>

                <dl class="row justify-content-center">
                    <dt class="col-sm-4 text-sm-end">Last Updated:</dt>
                    <dd class="col-sm-8 text-sm-start">{{ $post->updated_at->format('F d, Y h:i A') }}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6 mb-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-dark btn-lg w-100">Edit</a>
                    </div>

                    <div class="col-sm-6 mb-2">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark btn-lg w-100">Delete</button>
                        </form>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-light" style="color: blue"><< See All Posts</a>
                        </div>
                    </div>
                    
                    

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

