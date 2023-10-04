@extends('layouts.main')
@section('content')

    <form method="post" action="{{ route('post.update',$post->id) }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">

        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content">{{ $post->content }}</textarea>

        </div>
        <div class="mb-3">
            <label for="Image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="Image" value="{{ $post->image }}">

        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="category" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{ $category->id === $post->category->id ? ' selected':''}}

                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags (через ctrl несколько)</label>
            <select class="form-select" multiple aria-label="tags" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTags)
                            {{ $tag->id === $postTags->id ? ' selected':''}}
                        @endforeach
                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
