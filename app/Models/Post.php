<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //method 1
    //everything can be mass assigned except id ----->
    //protected $guarded = ['id'];

    //method 2
    //protected $fillable = ["title","excerpt","body"];

    protected $guarded = [];

    public function category()
    {
        //There are many situations => hasOne, hasMany, belongsTo, belongsToMany
        //And post belongs to category
        //-----> use belongsTo
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
