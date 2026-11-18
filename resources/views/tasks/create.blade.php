@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="bg-white rounded-xl shadow-xs border border-slate-200 p-6 sm:p-8">
        <div class="mb-6">
            <h1 class="text-xl font-bold text-slate-900 tracking-tight">Add New Task</h1>
            <p class="text-sm text-slate-500 mt-1">Fill in the details below to create a new task.</p>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-5"> {{-- bila tekan save task, post  hantar data ke request store --}}

            @csrf
            
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">
                    Task Title <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Task title" required
                    class="w-full px-3.5 py-2 text-sm bg-white border border-slate-300 rounded-lg shadow-2xs placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1">
                    Description
                </label>
                <textarea name="description" id="description" rows="3" placeholder="Task description"
                    class="w-full px-3.5 py-2 text-sm bg-white border border-slate-300 rounded-lg shadow-2xs placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="due_date" class="block text-sm font-medium text-slate-700 mb-1">
                        Due Date
                    </label>
                    <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" placeholder="Due Date"
                        class="w-full px-3.5 py-2 text-sm bg-white border border-slate-300 rounded-lg shadow-2xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                </div>

                <div>
                    <label for="priority" class="block text-sm font-medium text-slate-700 mb-1">
                        Priority <span class="text-rose-500">*</span>
                    </label>
                    <select name="priority" id="priority" required
                        class="w-full px-3.5 py-2 text-sm bg-white border border-slate-300 rounded-lg shadow-2xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="" disabled {{ old('priority') ? '' : 'selected' }}>Select Priority</option>
                        <option value="Low" {{ old('priority') === 'Low' ? 'selected' : '' }}>Low</option>
                        <option value="Medium" {{ old('priority') === 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="High" {{ old('priority') === 'High' ? 'selected' : '' }}>High</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <a href="{{ route('tasks.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">
                    &larr; View All Tasks
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-xs transition-colors cursor-pointer">
                    Save Task
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
