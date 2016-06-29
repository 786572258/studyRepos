<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //批量赋值
    protected $fillable = ['nickname', 'email', 'website', 'content', 'page_id', 'article_id'];
}