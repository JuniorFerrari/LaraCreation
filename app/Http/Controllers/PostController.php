<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
//    Вывод постов
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

//    Создание постов
    function create()
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('post.create',compact('categories','tags'));
    }

    function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => '',
            'tags' => '',

        ]);
        $tags = $data['tags'];
        unset($data['tags']);


        $post = Post::create($data);
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    function edit(Post $post)
    {
        $tags = Tag::all();

        $categories = Category::all();
        return view('post.edit', compact('post','categories','tags'));
    }

    function update(Post $post)
    {

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',

        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    function delete()
    {
        $post = Post::find(2);
        $post->delete();
        dd('Поздравляю башен близнецов нет твоя вина');
    }

    function firstOrCreate()
    {

        $anotherPost = [
            'title' => 'somebody',
            'content' => 'once',
            'image' => 'told me.png',
            'likes' => 990,
            'is_published' => 1,
        ];
        $posts = Post::firstOrCreate([
            'title' => 'somebody',
        ], $anotherPost);
        dump($posts->content);
        dd("Опля");
    }

    function updateOrCreate()
    {
//        не в парвильном порядке текст песни
        $anotherPost = [
            'title' => 'somebody',
            'content' => 'once',
            'image' => 'told me.png',
            'likes' => 990,
            'is_published' => 1
        ];
        $posts = Post::updateOrCreate([
            'title' => 'somebody'
        ], [
            'post_content' => 'told me',
            'image' => 'once.png',
        ]);
        dd('опля');
    }

    function restore($id)
    {
        $post = Post::withTrashed()->find($id);
        $post->restore();
        dd($post);
    }

    function category(Category $category)
    {
        $posts = $category->posts;
        return view('post.index', compact('posts'));
    }
}
