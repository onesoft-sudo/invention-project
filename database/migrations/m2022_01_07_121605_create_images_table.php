<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2022_01_07_121605_create_images_table extends Migration
{
    public function safeUp()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url')->notNull();
            $table->int('user_id')->notNull();
            $table->timestamps();
            $table->foreignKey('user_id', 'users', 'uid');
        });
    }

    public function safeDown()
    {
        Schema::dropIfExists('images');
    }
}
