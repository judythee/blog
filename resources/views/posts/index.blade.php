@extends('main')

@section('title', '|All Posts')

@section('stylesheets')

    @vite(['css/parsley.css'])

@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-4">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing" >Create New Post</a>
        </div>
        
        <div class="col-md-12">
            <hr>
        </div>

    </div>
    {{-- end of row --}}


    <div class="row">
        <div class="col-md-12 card shadow-lg border-0" style="background-color: rgb(243, 243, 243)">
            <table class="table table-hover table-light table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->body, 50) }}</td>
                            <td>{{ $post->created_at->format('F d, Y h:i A') }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary" >View</a>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary" >Edit</a>
                                    </div>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination Links--}}
            <div class="d-flex justify-content-center my-4">
                {{ $posts->links('vendor.pagination.bootstrap-5') }}
            </div>
            
        </div>
    </div>

@endsection
