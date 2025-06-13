<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $table = 'saves';
    protected $primaryKey = 'save_id';
    protected $guarded = ['save_id'];
}
