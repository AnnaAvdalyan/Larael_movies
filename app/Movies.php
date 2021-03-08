<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public function movies()
    {
        dd('test');
//        return $this->hasMany(Category::class, 'categories_id', 'id');
//        return $this->belongsTo(Category::class, 'genre_id', 'id');
    }
//    protected $fillable =['fname','lname'];
    public function users()
    {
//        return $this->hasMany(User::class, 'id', 'user_id');
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
