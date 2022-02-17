<?php

use OSN\Framework\Core\Migration;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;

class m2021_12_29_132427_create_params_table extends Migration
{
    public function safeUp()
    {
        Schema::create('params', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->timestamps();
            $table->foreignIdsFor([\App\Models\User::class]);
        });
    }

    public function safeDown()
    {
        Schema::dropIfExists('params');
    }
}
