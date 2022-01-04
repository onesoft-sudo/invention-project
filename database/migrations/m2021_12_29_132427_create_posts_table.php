<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2021_12_29_132427_create_posts_table extends Migration
{
    public function safeUp()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('caption');
            $table->text('content');
            $table->timestamps();
        });
    }

    public function safeDown()
    {
        Schema::dropIfExists('posts');
    }
}
