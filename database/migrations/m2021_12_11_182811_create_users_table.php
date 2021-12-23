<?php


use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2021_12_11_182811_create_users_table extends Migration
{
    public function safeUp()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('uid');
            $table->string('name')->notNull();
            $table->string('email')->notNull()->unique();
            $table->string('username')->notNull()->unique();
            $table->text('password')->notNull();
        });
    }

    public function safeDown()
    {
        Schema::dropIfExists('users');
    }
}
