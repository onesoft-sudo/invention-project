<?php


namespace App\Models;


use OSN\Framework\Core\Model;
use OSN\Framework\Database\HasFactory;

class Video extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->morphMany(Comment::class);
    }
}
