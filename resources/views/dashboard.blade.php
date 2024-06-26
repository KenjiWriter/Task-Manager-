@extends('layouts.app')

@section('title', 'Taskmen - Dasboard')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Dashboard</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Projects
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Team size</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Last update</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($projects as $project)
                            <tr>
                                <td class="w-1/3 text-left py-3 px-4 text-blue-500"><a href="{{ route('project.tasks', $project->id) }}">{{ $project->name }}</a></td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $project->description }}</td>
                                <td class="text-left py-3 px-4">{{ $project->users->count() }}</td>
                                <td class="text-left py-3 px-4">{{ $project->updated_at->format('Y-m-d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    
</div>

@endsection