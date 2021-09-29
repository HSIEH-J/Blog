<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posts()
    {
        //And one category can have many posts 
        //-----> hasMany
        return $this->hasMany(Post::class);
    }
}
