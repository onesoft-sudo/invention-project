<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2022_01_07_142051_create_tags_table extends Migration
{
    public function safeUp()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag_name')->notNull();
            $table->timestamps();
        });

        Schema::create('user_tag', function (Blueprint $table) {
            $table->int('user_id')->notNull();
            $table->int('tag_id')->notNull();
            $table->timestamps();
            $table->foreignKey('user_id', 'users', 'id');
            $table->foreignKey('tag_id', 'tags', 'id');
        });
    }

    public function safeDown()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('user_tag');
    }
}
