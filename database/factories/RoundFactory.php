<?php

namespace Database\Factories;

use App\Models\Race;
use App\Models\Round;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
 

class RoundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Round::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
   
    public function definition()
    {
         $race=Race::all()->random();
     
            return [
                'name' => Str::random(10),
                'details'=> Str::random(40),
                'map_image' => Str::random(40),
                'start_date' =>  Carbon::now(),
                'end_date' =>   Carbon::now(),
                'status' => 1,
                'race_id'=>$race->id
            ];
    
      
    }
}
