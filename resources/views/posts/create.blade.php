@extends('main')

@section('title', '| Create New Post')

@section('content')

    <div class="row">
        <div class="col-md-8 col-offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" >
                  </div>
                  <div class="mb-3">
                    <label for="body" class="form-label">Post Body:</label>
                    <textarea class="form-control" id="body" rows="3"></textarea>
                  </div>
                <button type="submit" class="btn btn-success btn-lg btn-block">Create Post</button>
            </form>
            
        </div>
    </div>
    

    
@endsection