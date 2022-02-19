<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2022_02_19_824966507_create_comments_table extends Migration
{
    public function safeUp()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->bigint('commentable_id');
            $table->string('commentable_type');
            $table->timestamps();
        });
    }

    public function safeDown()
    {
        Schema::dropIfExists('comments');
    }
}
