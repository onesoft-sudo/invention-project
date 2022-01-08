<?php


namespace App\Models;


use OSN\Framework\Core\Model;
use OSN\Framework\Database\HasFactory;
use OSN\Framework\Facades\Hash;
use OSN\Framework\ORM\Relationships\HasMany;
use OSN\Framework\ORM\Relationships\HasOne;

class User extends Model
{
    use HasFactory;

    protected array $fillable = [
        "name",
        "email",
        "username",
        "password",
        'role'
    ];

    public string $primaryColumn = 'uid';

    /**
     * @return \OSN\Framework\ORM\Relationships\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(Image::class);
    }
}
