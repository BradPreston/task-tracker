<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'task_status_id',
        'company_id',
        'note_id',
        'task_url',
        'priority',
    ];

    /**
     * Get the task status for the task.
     */
    public function taskStatus()
    {
        return $this->belongsTo(TaskStatus::class);
    }

    /**
     * Get the company for the task.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the note for the task.
     */
    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
