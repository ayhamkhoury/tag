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

    public function Races(){
        return $this->belongsTo(Race::class);
    }

    public function Drivers(){
        return $this->belongsToMany(Driver::class);
    }
}
