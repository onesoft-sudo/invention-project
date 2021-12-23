<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2021_11_12_104600_initial extends Migration
{
    public function safeUp()
    {
        Schema::create('migrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps('created_at');
        });
    }

    public function safeDown()
    {
        Schema::dropIfExists('migrations');
    }
}
