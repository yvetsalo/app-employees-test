<?php

namespace Database\Factories;

use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Employee;
use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'position_id' => Position::factory(),
            'superior_id' => null,
            'start_date' => now(),
            'end_date' => now()->addMonth(),
        ];
    }
}
