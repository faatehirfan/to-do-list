<h1>Add New Task</h1>

@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('tasks.store') }}" method="POST"> {{-- bila tekan save task, post  hantar data ke request store --}}

    @csrf
    
    <input type="text" name="title" placeholder="Task title">

    <input type="text" name="description" placeholder="Task description">

    <input type="date" name="due_date" placeholder="Due Date">

    <input type="text" name="priority" placeholder="Priority">

    <button type="submit">Save Task</button>

</form>

<a href="{{ route('tasks.index') }}">
    View All Tasks
</a>