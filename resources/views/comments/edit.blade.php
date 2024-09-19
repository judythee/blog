@extends('main')

@section('title', "| Edit Comment")

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6" >
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-dark text-white text-center">
                        <h2>Edit Comment</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $comment->name }}" disabled>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ $comment->email }}" disabled>
                            </div>
                            
                            <div class="mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control form-control-lg" id="comment" name="comment" rows="5" >{{ $comment->comment }}</textarea>
                            </div>
                            
                            <div class="col-sm-6 mb-2">
                                <button type="submit" class="btn btn-dark btn-lg w-100">Update Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection