<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Round extends Model
{
    use HasFactory;
    
    protected $keyType = 'string';
    public $incrementing = false;


    protected $fillable = [
      
        'name',
        'racetrack',
        'details',
        'map_image',
        'start_date',
        'end_date',
        'status',
        'race_id',
    ];


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function race(){
        return $this->belongsTo(Race::class);
    }

    public function drivers(){
        return $this->belongsToMany(Driver::class,'round_driver');
    }

    public function vote(){
        return $this->belongsTo(Vote::class,'foreign_key');
    }
}
