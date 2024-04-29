<?php

namespace Database\Factories;

use App\Enums\EmployeeType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => '123456',
            'type' => $this->faker->randomElement(EmployeeType::values()),
        ];
    }

    /**
     * Indicate employee with type admin.
     *
     * @return void
     */
    public function admin(): static
    {
        return $this->state(fn($attributes) => [
            'type' => EmployeeType::ADMIN,
        ]);
    }

    /**
     * Indicate employee with type employee.
     *
     * @return void
     */
    public function employee(): static
    {
        return $this->state(fn($attributes) => [
            'type' => EmployeeType::EMPLOYEE,
        ]);
    }
}
