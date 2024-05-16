<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectTaskController extends Controller
{
    public function index(Project $project)
    {
        $user = Auth::user();
        $tasks = $project->tasks()->whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('project.tasks', compact('project', 'tasks'));
    }
}
