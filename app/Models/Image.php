<?php


namespace App\Models;


use OSN\Framework\Core\Model;
use OSN\Framework\Database\HasFactory;
use OSN\Framework\ORM\Relationships\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected array $fillable = ['url'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
