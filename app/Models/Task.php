<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'due_date',
        'status',
        'project_id',
        'estimated_hours',
    ];

    protected $statusLabels = [
        0 => 'New',
        1 => 'In Progress',
        2 => 'Ready to Order',
        3 => 'Closed',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getStatusLabelAttribute()
    {
        return $this->statusLabels[$this->status] ?? 'Unknown';
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_users', 'task_id', 'user_id');
    }
}