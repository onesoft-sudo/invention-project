<?php


namespace Database\Factories;


use App\Models\User;
use OSN\Framework\Database\Factory;

class UserFactory extends Factory
{
    protected string $model = User::class;

    public function define(): array
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
        ];
    }
}
