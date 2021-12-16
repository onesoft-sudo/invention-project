<?php


use App\Core\Migration;

class m2021_11_12_104600_initial extends Migration
{
    protected bool $entryLogging = true;

    public function safeUp($pdo)
    {
        $pdo->query("CREATE TABLE migrations(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            applied_at TIMESTAMP NOT NULL
        );");
    }

    public function safeDown($pdo)
    {
        $pdo->query("DROP TABLE migrations;");
    }
}