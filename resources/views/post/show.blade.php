@extends('layouts.main')
@section('content')
<div class="">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">likes</th>
        </tr>
        </thead>
        <tbody>



            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->likes}}</td>
            </tr>


            </tbody>
    </table>
    <div class="">
        <a href="{{ route('post.edit', $post->id) }}">Edit</a>
    </div>
    <div class="">
        <a href="{{ route('post.index') }}" class="btn btn-info mt-3">Back</a>
    </div>
    <div class="">
        <form action="{{ route('post.delete',$post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mt-3">Delete</button>
        </form>
    </div>

</div>
@endsection
