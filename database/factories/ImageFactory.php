<?php


namespace Database\Factories;


use App\Models\Image;
use OSN\Framework\Database\Factory;

class ImageFactory extends Factory
{
    protected string $model = Image::class;

    public function define(): array
    {
        return [
            'url' => $this->faker->url(),
            'user_id' => round(rand(0, 1)) == 1 ? 7 : 9,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
