@extends('main')

@section('title', '| Edit Blog Post')

@section('content')

<div class="container mt-5" >
    <div class="row justify-content-center">
        <div class="col-md-6" >
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white text-center">
                    <h2>Edit Post</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('posts.update', $post->id)}}" method="PUT">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control form-control-lg" value="{{ $post->title }}" required >
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control form-control-lg" id="slug" name="slug" value="{{ $post->slug }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-control form-select" id="category_id" name="category_id" required>
                                <option value="" disabled>Select a category</option>
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}" {{ $post->category_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="created_at" class="form-label">Created At</label>
                            <input type="text" id="created_at" class="form-control" value="{{ $post->created_at->format('F d, Y h:i A') }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="updated_at" class="form-label">Last Updated At</label>
                            <input type="text" id="updated_at" class="form-control" value="{{ $post->updated_at->format('F d, Y h:i A') }}" disabled>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-dark btn-lg w-100">Cancel</a>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <button type="submit" class="btn btn-dark btn-lg w-100">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection