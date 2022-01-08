<?php


namespace App\Models;


use OSN\Framework\Core\Model;
use OSN\Framework\Database\HasFactory;
use OSN\Framework\ORM\Relationships\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected array $fillable = ['tag_name'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_tag');
    }
}
