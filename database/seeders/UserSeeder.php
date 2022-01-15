<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use OSN\Framework\Core\Database;
use OSN\Framework\Database\Seeder;
use OSN\Framework\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * @param Database $db
     */
    public function execute(Database $db)
    {
        User::create([
            'name' => 'Ar Rakin',
            'username' => 'root',
            'email' => 'rakinar2@gmail.com',
            'password' => Hash::sha1('rakinar2'),
        ]);

        User::factory()->create();
    }
}
