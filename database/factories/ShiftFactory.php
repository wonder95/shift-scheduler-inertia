<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Shift;
use App\Models\User;

class ShiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeThisMonth(),
            'station_id' => $this->faker->randomElement([1,2]),
            //TODO: Get full range of existing user IDs
            // $users = User::all()->pluck('id')->toArray();
            // $this->faker->randomElement([1,2,3,4,5]),
            'user_id' => $this->faker->randomElement([3,4,5,6,7]),
            'am_pm' => 'pm'
        ];
    }
}
