<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCommentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_type',
        'post_id',
        'user_id',
        'post_log',
    ];
}
