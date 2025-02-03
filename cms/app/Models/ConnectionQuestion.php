<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectionQuestion extends Model
{
    protected $fillable = [
      'question',
      'quiz_id',
      'first_half',
      'second_half'
    ];

}
