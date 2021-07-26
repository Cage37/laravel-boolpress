<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['author', 'title', 'subtitle' , 'image', 'content', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
