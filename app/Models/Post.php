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
    protected $fillable = ["title","excerpt","body"];

    public function category()
    {
        //There are many situations => hasOne, hasMany, belongsTo, belongsToMany
        //And post belongs to category
        //-----> belongsTo
        return $this->belongsTo(category::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
