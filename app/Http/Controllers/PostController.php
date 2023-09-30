<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
//    Вывод постов
    public function index(){
        $post = Post::where('is_published', 0)->first();
        dump($post->title);
        dd('end');
    }
//    Создание постов
    function create(){
        $postsArr = [
            [
                'title' => 'Какая то чушь',
                'content' => 'текст чуши',
                'image' => 'чушь.jpeg',
                'likes' => 99,
                'is_published' => 1,
            ]
        ];
        foreach ($postsArr as $item){

            Post::create($item);
        }
        dd('created');
    }
    function update(){
        $post = Post::find(3);
        $post->update( [
            'title' => 'Какая то чушь обновлено',
            'content' => 'текст чуши обновлено',
            'image' => 'чушь.jpeg обновлено',
            'likes' => 990,
            'is_published' => 1,
        ]);
        dd('Чекай бд');
    }
    function delete(){
        $post = Post::find(1);
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
            'content' => 'told me',
            'image' => 'once.png',
        ]);
        dd('опля');
    }
}
