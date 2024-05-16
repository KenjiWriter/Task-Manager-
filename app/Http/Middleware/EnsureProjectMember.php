<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureProjectMember
{
    /**
     * Handle an incoming requesst.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $projectId = $request->route('project')->id;
        $user = Auth::user();

        if (!$user->projects->contains($projectId)) {
            return redirect()->route('dashboard')->with('error', 'You are not a member of this project.');
        }

        return $next($request);
    }
}
