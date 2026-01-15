<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'problem',
        'issue_description',
        'context',
        'solution',
        'notes',
    ];

    /**
     * Get the tasks for the note.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
