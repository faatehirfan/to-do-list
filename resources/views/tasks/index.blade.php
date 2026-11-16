@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Task Management</h1>
            <p class="text-sm text-slate-500 mt-1">Organize, track, and manage your daily tasks.</p>
        </div>
        <a href="{{ route('tasks.create') }}" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2.5 rounded-lg shadow-sm transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add New Task</span>
        </a>
    </div>

    <!-- Table Card Container -->
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
        @if ($tasks->isEmpty())
            <div class="text-center py-16 px-4">
                <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="text-base font-semibold text-slate-800">No tasks found</h3>
                <p class="text-slate-500 text-sm mt-1">Get started by creating your first task!</p>
                <a href="{{ route('tasks.create') }}" class="mt-4 inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline">
                    Create a task &rarr;
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-50/75 border-b border-slate-200 text-slate-500 font-semibold text-xs uppercase tracking-wider">
                            <th class="py-3.5 px-4 sm:px-6">Title</th>
                            <th class="py-3.5 px-4">Description</th>
                            <th class="py-3.5 px-4">Due Date</th>
                            <th class="py-3.5 px-4">Priority</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4 sm:px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($tasks as $task)
                            <tr class="hover:bg-slate-50/60 transition-colors">
                                <td class="py-4 px-4 sm:px-6 font-medium text-slate-900">
                                    {{ $task->title }}
                                </td>
                                <td class="py-4 px-4 text-slate-500 max-w-xs truncate">
                                    {{ $task->description ?? '—' }}
                                </td>
                                <td class="py-4 px-4 text-slate-500 whitespace-nowrap">
                                    {{ $task->due_date ? date('M d, Y', strtotime($task->due_date)) : '—' }}
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        @if(strtolower($task->priority) === 'high') bg-rose-50 text-rose-700 border border-rose-200
                                        @elseif(strtolower($task->priority) === 'medium') bg-amber-50 text-amber-700 border border-amber-200
                                        @else bg-blue-50 text-blue-700 border border-blue-200 @endif">
                                        {{ $task->priority }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if(strtolower($task->status) === 'completed') bg-emerald-50 text-emerald-700 border border-emerald-200
                                        @elseif(strtolower($task->status) === 'in progress') bg-blue-50 text-blue-700 border border-blue-200
                                        @else bg-slate-100 text-slate-700 border border-slate-200 @endif">
                                        {{ $task->status }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 sm:px-6 text-right whitespace-nowrap">
                                    <div class="inline-flex items-center gap-1">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-xs font-medium text-blue-600 hover:text-blue-800 px-2.5 py-1.5 rounded-md hover:bg-blue-50 transition-colors">
                                            Edit Task
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-medium text-rose-600 hover:text-rose-800 px-2.5 py-1.5 rounded-md hover:bg-rose-50 transition-colors cursor-pointer">
                                                Delete Task
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
