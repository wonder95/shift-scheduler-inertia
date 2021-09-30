<?php

namespace Database\Factories;

use App\Models\UserContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->randomElement([3, 4, 5, 6, 7]),
            'personal_email' => $this->faker->safeEmail,
            'primary_phone' => $this->faker->numerify('###-###-####'),
            'secondary_phone' => $this->faker->numerify('###-###-####'),
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode
        ];
    }
}
