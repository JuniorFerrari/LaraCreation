<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
//    Вывод постов
    public function index(){
        $posts = Post::all();

        return view('post.index',compact('posts'));
    }
//    Создание постов
    function create(){
        return view('post.create');
    }

    function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',

        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }
    function update(Post $post){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',

        ]);
        $post->update($data);
        return redirect()->route('post.show',$post->id);
    }

    function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
    function delete(){
        $post = Post::find(2);
        $post->delete();
        dd('Поздравляю башен близнецов нет твоя вина');
    }

    function firstOrCreate()
    {

        $anotherPost=[
            'title' => 'somebody',
            'content' => 'once',
            'image' => 'told me.png',
            'likes' => 990,
            'is_published' => 1,
        ];
        $posts = Post::firstOrCreate([
            'title' => 'somebody',
        ],$anotherPost);
        dump($posts->content);
        dd("Опля");
    }

    function updateOrCreate()
    {
//        не в парвильном порядке текст песни
        $anotherPost=[
            'title' => 'somebody',
            'content' => 'once',
            'image' => 'told me.png',
            'likes' => 990,
            'is_published' => 1
        ];
        $posts = Post::updateOrCreate([
            'title' => 'somebody'
        ],[
            'post_content' => 'told me',
            'image' => 'once.png',
        ]);
        dd('опля');
    }
}
