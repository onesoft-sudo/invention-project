<?php


namespace App\Models;


use OSN\Framework\Core\Model;
use OSN\Framework\Database\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected array $fillable = [
        "caption",
        "content",
        "created_at",
        "updated_at",
    ];
}
