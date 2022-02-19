<?php


namespace App\Models;


use OSN\Framework\Core\Model;
use OSN\Framework\Database\HasFactory;

class Comment extends Model
{
    use HasFactory;

    public function commentable(): \OSN\Framework\ORM\Relationships\Polymorphic\MorphTo
    {
        return $this->morphTo();
    }
}
