@extends('layouts.main')
@section('content')

    <form method="post" action="{{ route('post.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" >

        </div>
        <div class="mb-3">
            <label for="content" class="content">Content</label>
            <textarea class="form-control" name="content" id="content" ></textarea>

        </div>
        <div class="mb-3">
            <label for="Image" class="Image">Image</label>
            <input type="text" name="image" class="form-control" id="Image" >

        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection