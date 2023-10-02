@extends('layouts.main')
@section('content')

    <form method="post" action="{{ route('post.update',$post->id) }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">

        </div>
        <div class="mb-3">
            <label for="content" class="content">Content</label>
            <textarea class="form-control" name="content" id="content" >{{ $post->content }}</textarea>

        </div>
        <div class="mb-3">
            <label for="Image" class="Image">Image</label>
            <input type="text" name="image" class="form-control" id="Image"  value="{{ $post->image }}">

        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
