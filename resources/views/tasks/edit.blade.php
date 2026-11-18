@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 p-6 sm:p-8">
        <div class="mb-6">
            <h1 class="text-xl font-bold text-slate-900 tracking-tight">Edit Task</h1>
            <p class="text-sm text-slate-500 mt-1">Update task details and track status changes.</p>
        </div>

        <form action="{{ route('tasks.update', $task) }}"
              method="POST" class="space-y-5"> {{-- post update ke controller update req--}}

            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">
                    Title <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="title" id="title" placeholder="Task title"
                       value="{{ old('title', $task->title) }}" required
                       class="w-full px-3.5 py-2 text-sm bg-white border border-slate-300 rounded-lg shadow-2xs focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1">
                    Description
                </label>
                <textarea name="description" id="description" rows="3" placeholder="Task description"
                          class="w-full px-3.5 py-2 text-sm bg-white border border-slate-300 rounded-lg shadow-2xs focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="due_date" class="block text-sm font-medium text-slate-700 mb-1">
                        Due Date
                    </label>
                    <input type="date" name="due_date" id="due_date" placeholder="Due Date"
                           value="{{ old('due_date', $task->due_date) }}"
                           class="w-full px-3.5 py-2 text-sm bg-white border border-slate-300 rounded-lg shadow-2xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                </div>

                <div>
                    <label for="priority" class="block text-sm font-medium text-slate-700 mb-1">
                        Priority <span class="text-rose-500">*</span>
                    </label>
                    <select name="priority" id="priority" required
                            class="w-full px-3.5 py-2 text-sm bg-white border border-slate-300 rounded-lg shadow-2xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="Low" {{ old('priority', $task->priority) === 'Low' ? 'selected' : '' }}>Low</option>
                        <option value="Medium" {{ old('priority', $task->priority) === 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="High" {{ old('priority', $task->priority) === 'High' ? 'selected' : '' }}>High</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-1">
                        Status <span class="text-rose-500">*</span>
                    </label>
                    <select name="status" id="status" required
                            class="w-full px-3.5 py-2 text-sm bg-white border border-slate-300 rounded-lg shadow-2xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="Pending" {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In Progress" {{ old('status', $task->status) === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <a href="{{ route('tasks.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">
                    &larr; View All Tasks
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-xs transition-colors cursor-pointer">
                    Update Task
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
