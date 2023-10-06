<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    const TITLE = 'title';
    const CONTENT = 'content';
    const CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this,'title'],
            self::CONTENT => [$this,'content'],
            self::CATEGORY_ID => [$this,'category_id'],
        ];
    }

    function title(Builder $builder,$value)
    {
        $builder->where('title','like',"%{$value}%");
    }
    function content(Builder $builder,$value)
    {
        $builder->where('content','like',"%{$value}%");
    }
    function category_id(Builder $builder,$value)
    {
        $builder->where('category_id',$value);
    }
}
