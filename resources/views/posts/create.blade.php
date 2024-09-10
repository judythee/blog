@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

    @vite(['public/css/parsley.css', 'resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white text-center">
                    <h2>Create New Post</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('posts.store') }}" method="POST" data-parsley-validate=''>
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control " id="title" name="title" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug URL</label>
                            <input type="text" class="form-control " id="slug" name="slug" required minlength="5" maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-control form-select" id="category_id" name="category_id" style="max-height: 200px; overflow-y: auto;">
                                <option value="" disabled selected style="color: #6c757d;">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <select class="form-control js-example-basic-single" multiple id="tags" name="tags" style="max-height: 200px; overflow-y: auto;" >
                                
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>          
                                      
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control " id="body" name="body" rows="9" required></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark mx-auto">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

    @vite(['public/js/parsley.min.js', 'resources/js/app.js'])
    <script type='module' src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" ></script>
@endsection