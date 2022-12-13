<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'images',
        'is_post',
        'post',
        'author',
    ];

    public function authors()
    {
        return $this->hasOne(User::class,'id','author');
    }
}
