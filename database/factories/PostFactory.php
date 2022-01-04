<?php


namespace Database\Factories;


use App\Models\Post;
use OSN\Framework\Database\Factory;

class PostFactory extends Factory
{
    protected string $model = Post::class;

    public function define(): array
    {
        return [
            "caption" => $this->faker->sentence(10),
            "content" => $this->faker->paragraph(10),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
