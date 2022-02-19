<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2022_02_19_594000949_create_videos_table extends Migration
{
    public function safeUp()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
    }

    public function safeDown()
    {
        Schema::dropIfExists('videos');
    }
}
