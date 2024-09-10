<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'category_id', 'slug', 'tags', 'body'];

    public function category()
    {
        return $this->belongsTo(Category::class);    
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
    public function comments(){
        return $this->hasMany(Post::class);
    }


}
