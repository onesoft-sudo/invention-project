<?php


namespace App\Models;


use OSN\Framework\Core\Model;
use OSN\Framework\Database\HasFactory;

class Param extends Model
{
    use HasFactory;

    protected array $fillable = [
        "content",
        "created_at",
        "updated_at",
        "user_id"
    ];
}
