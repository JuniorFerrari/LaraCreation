<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

    function update($post,$data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
    }
}
