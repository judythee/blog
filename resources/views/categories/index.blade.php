@extends('main')

@section('title', '| All Categories')



@section('content')

<div class="row">
    <div class="col-md-8 card shadow-lg border-0" style="background-color: rgb(243, 243, 243); margin-top: 20px">
        <table class="table table-hover table-light table-bordered table-striped">
            <h2 class="row justify-content-center">Categories</h2>
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-4">
        <div class="card shadow-lg border-0" style="background-color: rgb(243, 243, 243); margin-top: 20px">
            <div class="card-header bg-dark text-white text-center">
                <h2>New Category</h2>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark mx-auto">Create New Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>



@endsection