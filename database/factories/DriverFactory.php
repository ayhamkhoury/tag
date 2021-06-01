<?php

namespace Database\Factories;

use App\Models\Round;
use App\Models\Driver;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $round=Round::all()->random();
        
     
        return [
             
        ];
    }
}
