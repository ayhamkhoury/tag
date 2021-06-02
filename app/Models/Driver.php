<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;
    
    protected $keyType = 'string';
    public $incrementing = false;

    
    protected $fillable = [
        'name',
        'details',
        'image',
        'status'
      
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
            
        });
    }

    public function rounds(){
        return $this->belongsToMany(Round::class,'round_driver');
    }
}


