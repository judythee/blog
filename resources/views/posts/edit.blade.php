@extends('main')

@section('title', '|Edit Blog Post')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card" style="background-color: rgb(236, 236, 236)">
                <div class="card-body">
                    <h1 class="display-4 text-center">Edit</h1>
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control form-control-lg" value="{{ $post->title }}" required >
                        </div>

                        <div class="form-group mb-3">
                            <label for="body" class="form-label">Body:</label>
                            <textarea name="body" id="body" class="form-control" rows="5" required>{{ $post->body }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="created_at" class="form-label">Created At:</label>
                            <input type="text" id="created_at" class="form-control" value="{{ $post->created_at->format('F d, Y h:i A') }}" disabled>
                        </div>

                        <div class="form-group mb-3">
                            <label for="updated_at" class="form-label">Last Updated:</label>
                            <input type="text" id="updated_at" class="form-control" value="{{ $post->updated_at->format('F d, Y h:i A') }}" disabled>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-lg w-100">Cancel</a>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <button type="submit" class="btn btn-success btn-lg w-100">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection