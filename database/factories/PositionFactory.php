<?php

namespace Database\Factories;

use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Employee;
use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Position::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'is_management' => false,
        ];
    }
}
