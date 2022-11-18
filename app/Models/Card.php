<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'title',
        'sort',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
