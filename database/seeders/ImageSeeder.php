<?php

namespace Database\Seeders;

use App\Commands\Console\DBCommand;
use App\Models\Image;
use App\Models\Post;
use OSN\Framework\Core\Database;
use OSN\Framework\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function execute(Database $db)
    {
        Image::factory()->create();
    }
}
