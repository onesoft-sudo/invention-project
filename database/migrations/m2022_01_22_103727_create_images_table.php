<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2022_01_22_103727_create_images_table extends Migration
{
    public function safeUp()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInt('imageable_id');
            $table->string('imageable_type');
        });
    }

    public function safeDown()
    {
        Schema::dropIfExists('images');
    }
}
