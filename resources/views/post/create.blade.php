@extends('layouts.main')
@section('content')

    <form method="post" action="{{ route('post.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-labe">Title</label>
            <input type="text" name="title" class="form-control" id="title" >

        </div>
        <div class="mb-3">
            <label for="content" class="form-labe">Content</label>
            <textarea class="form-control" name="content" id="content" ></textarea>

        </div>
        <div class="mb-3">
            <label for="Image" class="form-labe">Image</label>
            <input type="text" name="image" class="form-control" id="Image" >

        </div>
        <div class="mb-3">
            <label for="category" class="form-labe">Category</label>
            <select class="form-select" aria-label="category" id="category" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags (через ctrl несколько)</label>
            <select class="form-select" multiple aria-label="tags" id="tags" name="tags[]">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
