<?php


use App\Core\Migration;

class m2021_12_11_182811_create_users_table extends Migration
{
    public function safeUp($pdo)
    {
        $pdo->query("CREATE TABLE users(
            uid INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            username VARCHAR(45) NOT NULL UNIQUE,
            email VARCHAR(45) NOT NULL UNIQUE,
            password TEXT NOT NULL
        );");
    }

    public function safeDown($pdo)
    {
        $pdo->query("DROP TABLE users");
    }
}