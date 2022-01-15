<?php


namespace Database\Factories;


use App\Models\Tag;
use OSN\Framework\Database\Factory;

class TagFactory extends Factory
{
    protected string $model = Tag::class;

    public function define(): array
    {
        return [
            'tag_name' => $this->faker->word(),
        ];
    }
}
