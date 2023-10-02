@extends('layouts.main')
@section('content')
<div class="">
    <div class="diva">
        This is post page
    </div>
    @foreach($posts as $post)
        <div>{{ $post->title }}</div>
        <div>{{ $post->content }}</div>
        <div>{{ $post->likes }}</div>
    @endforeach
</div>
@endsection
