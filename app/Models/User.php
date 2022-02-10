<?php


namespace App\Models;


use OSN\Framework\Core\Model;
use OSN\Framework\Database\HasFactory;
use OSN\Framework\Database\Query;
use OSN\Framework\Facades\Hash;
use OSN\Framework\ORM\Relationships\BelongsToMany;
use OSN\Framework\ORM\Relationships\HasMany;
use OSN\Framework\ORM\Relationships\HasOne;
use OSN\Framework\ORM\Relationships\Polymorphic\MorphOne;

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

    public function post()
    {
        return $this->hasOne(Post::class)->last();
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'user_tag');
    }
}
