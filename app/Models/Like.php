<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $primaryKey = 'like_id';
    protected $guarded = ['like_id'];
}
