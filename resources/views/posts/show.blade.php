@extends('main')

@section('title', '| View Post')

@section('content')
<div class="row" >
    <div class="col-md-7 ">
        <div>
            <h1 class="display-4">{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>
        </div>

        <hr>

        <div>
            @foreach ($post->tags as $tag)
                <span class="label label-default">{{$tag->name}}</span>
            @endforeach
        </div>
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

    <div id="backend-comments" style="margin-top: 50px;">
        <h3>Comments &#128522;&#128073;<small>{{$post->comments()->count() }} total</small></h3>

        <table class="table table-hover table-light table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th width=150px></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($post->comments as $comment)
                    <tr>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{Str::limit($comment->comment, 50)}}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-6 mb-2">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary" ><i class="bi bi-pencil"></i></a>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-sm btn-danger" ><i class="bi bi-trash"></i></a>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>



@endsection

