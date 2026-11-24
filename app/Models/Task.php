<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'priority',
        'status',
    ];

    /**
     * Get the user that owns this task.
     */
    public function user(): BelongsTo //each task belongs to one user.(inverse of one to many relationship)
    {
        return $this->belongsTo(User::class);
    }
}
