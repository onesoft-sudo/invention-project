<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2022_01_05_161443_create_user_id_column_in_posts_table extends Migration
{
    public function safeUp()
    {
        Schema::add('posts', function (Blueprint $table) {
            $table->int('user_id');
        });
    }

    public function safeDown()
    {
        Schema::dropColumns('posts', ['user_id']);
    }
}
