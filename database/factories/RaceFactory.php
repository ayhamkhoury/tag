<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Race;
use Carbon\Carbon;
use DateTime;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

class RaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Race::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          
            'name' => Str::random(10),
            'details'=> Str::random(40),
            'image' => Str::random(40),
            'start_date' =>  '2021-05-31 12:00:00',
            'end_date' =>  '2021-06-01 12:00:00',
             'status' => 1,
             
        ];
    }
}
