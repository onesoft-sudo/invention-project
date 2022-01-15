<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Database\Factories\UserFactory;
use OSN\Framework\Core\Database;
use OSN\Framework\Database\Seeder;

class PostSeeder extends Seeder
{
    public function execute(Database $db)
    {
        Post::factory()->create();
    }
}
