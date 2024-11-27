<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'public',
        'category',
        'name',
        'views',
        'favourites'
        ];
}
