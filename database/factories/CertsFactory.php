<?php

namespace Database\Factories;

use App\Models\Certs;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->randomElement([3, 4, 5, 6, 7]),
            'emt_type' => $this->faker->randomElement(['B', 'P', 'I', 'R']),
            'sr_ff' => $this->faker->boolean,
            'driver' => $this->faker->boolean,
            'ao' => $this->faker->boolean,
            'wto' => $this->faker->boolean
        ];
    }
}
