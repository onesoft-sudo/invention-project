<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2022_01_03_164426_create_random_table extends Migration
{
    public function safeUp()
    {
        Schema::create('random', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->timestamps();
        });

        Schema::createIndex('random', 'main_index', ['name', 'username']);
    }

    public function safeDown()
    {
        Schema::dropIfExists('random');
    }
}
