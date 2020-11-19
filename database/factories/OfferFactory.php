<?php

namespace Database\Factories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->realText($maxNbChars = 10, $indexSize = 2),
            'description' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'city_id' => random_int(1 , 30),
            'subcategory_id' => random_int(1 , 16),
            'user_id' => 1
        ];
    }
}
