<h1>Task Management</h1>

<a href="{{ route('tasks.create') }}">
    Add New Task
</a>


<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Due Date</th>
        <th>Priority</th>
        <th>Status</th>
    </tr>

    @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->due_date }}</td>
            <td>{{ $task->priority }}</td>
            <td>{{ $task->status }}</td>
            <td><a href="{{ route('tasks.edit', $task->id) }}">Edit Task</a></td>
            <td>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Task</button>
                </form>
        </tr>
    @endforeach
</table>