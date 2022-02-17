<?php


namespace Database\Factories;


use App\Models\Param;
use App\Models\Post;
use OSN\Framework\Database\Factory;

class ParamFactory extends Factory
{
    protected string $model = Param::class;

    public function define(): array
    {
        return [
            "content" => $this->faker->paragraph(15),
            "created_at" => now(),
            "updated_at" => now(),
            "user_id" => round(rand(0, 1)) == 1 ? 1 : 2
        ];
    }
}
