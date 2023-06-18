@extends('layouts.dashboard.client.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; ">
        Edit recipe
    </h3>
    <br>
    <form action="{{ route('client.recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="name" value="{{ $recipe->name }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="description" rows="5" required>{{ $recipe->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="picture">
            <input type="hidden" name="old_picture" value="{{ $recipe->picture }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
@endsection

