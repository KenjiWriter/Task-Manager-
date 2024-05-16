<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'due_date',
        'status',
    ];

    // Relacje
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_users', 'project_id', 'user_id')->withPivot('role');
    }

    public function tasks()
    {
        return $this->hasManyThrough(Task::class, TaskUser::class, 'project_id', 'id', 'id', 'task_id');
    }
}