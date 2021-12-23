<?php


namespace App\Models;


use OSN\Framework\Core\Model;
use OSN\Framework\Database\HasFactory;
use OSN\Framework\Facades\Hash;

class User extends Model
{
    use HasFactory;

    protected array $fillable = [
        "name",
        "email",
        "username",
        "password"
    ];

    protected static string $primaryColumn = 'uid';
}
