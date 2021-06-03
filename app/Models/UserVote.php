<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'driver_id',
        'round_id',
        'vote_id',
    ];

   

}
