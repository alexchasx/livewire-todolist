<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sort',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class)->orderBy('sort');
    }
}
