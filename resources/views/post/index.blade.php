@extends('layouts.main')
@section('content')
<div class="">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">category</th>
        </tr>
        </thead>
        <tbody>
    @foreach($posts as $post)


            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a href="{{ route('post.show',$post->id) }}">{{$post->title}}</a></td>
                <td>{{$post->content}}</td>
                <td>{{$post->category->title}}</td>
            </tr>

    @endforeach
            </tbody>
    </table>
    <div class="">
        {{ $posts->links() }}
    </div>
    <div class="">
        <a href="{{ route('post.create') }}" class="btn btn-warning mt-3">Создать</a>
    </div>
</div>
@endsection
