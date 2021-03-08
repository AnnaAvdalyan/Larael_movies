<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function movies()
    {
        return 'ok';
//        return $this->hasMany(Category::class, 'categories_id', 'id');
//        return $this->belongsTo(Category::class, 'genre_id', 'id');
    }

//    protected $fillable = ['fname', 'lname'];
}
