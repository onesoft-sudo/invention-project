<?php


namespace App\Core;


abstract class Migration
{
    protected string $migrationName;
    protected bool $entryLogging = true;

    abstract public function safeUp($pdo);
    abstract public function safeDown($pdo);

    public function __construct()
    {
        $this->migrationName = get_class($this);
    }

    public function registerMigration($pdo)
    {
        $timestamp = date("Y-m-d H:i:s");

        $stmt = $pdo->prepare("INSERT INTO migrations(name, applied_at) VALUES(:name, :applied_at);");
        $stmt->execute(["name" => $this->migrationName, "applied_at" => $timestamp]);
    }

    public function unregisterMigration($pdo)
    {
        $stmt = $pdo->prepare("DELETE FROM migrations WHERE name = :name");
        $stmt->execute(["name" => $this->migrationName]);
    }

    public function isApplied($pdo): bool
    {
        $tables = $pdo->query("SELECT name FROM sqlite_master WHERE type = 'table'")->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            if ($table["name"] == 'migrations') {
                $migrations = $pdo->query("SELECT * FROM migrations WHERE name = '{$this->migrationName}'")->fetchAll(\PDO::FETCH_ASSOC);

                if (count($migrations) > 0) {
                    return true;
                }

                break;
            }
        }

        return false;
    }

    public function up($pdo): bool
    {
        if (!$this->isApplied($pdo)){
            $this->safeUp($pdo);

            if ($this->entryLogging)
                $this->registerMigration($pdo);

            return true;
        }

        return false;
    }

    public function down($pdo): bool
    {
        if ($this->isApplied($pdo)) {
            if ($this->entryLogging)
                $this->unregisterMigration($pdo);

            $this->safeDown($pdo);
            return true;
        }

        return false;
    }
}