<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['name', 'text','categories_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
