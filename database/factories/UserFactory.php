<?php


namespace Database\Factories;


use App\Models\User;
use OSN\Framework\Database\Factory;
use OSN\Framework\Facades\Hash;

class UserFactory extends Factory
{
    protected string $model = User::class;

    public function define(): array
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->email(),
            'password' => Hash::sha1($this->faker->password()),
        ];
    }

    public function suspended(): self
    {
        return $this->state(function ($attrs) {
            return [
                'user_token' => 'emu7',
            ];
        });
    }
}
