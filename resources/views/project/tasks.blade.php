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
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Due Time</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($tasks as $task)
                            <tr>
                                <td class="w-1/3 text-left py-3 px-4">{{ $task->name }}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $task->description }}</td>
                                <td class="text-left py-3 px-4">{{ $task->status_label }}</td>
                                <td class="text-left py-3 px-4">{{ $task->due_date }}</td>
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