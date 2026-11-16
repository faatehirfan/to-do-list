<form action="{{ route('tasks.update', $task) }}"
      method="POST"> {{-- post update ke controller update req--}}

    @csrf
    @method('PUT')

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" placeholder="Task title"
           value="{{ $task->title }}">

    <label for="description">Description:</label>
    <input type="text" name="description" id="description" placeholder="Task description"
           value="{{ $task->description }}">

    <label for="due_date">Due Date:</label>
    <input type="date" name="due_date" id="due_date" placeholder="Due Date"
           value="{{ $task->due_date }}">

    <label for="priority">Priority:</label>
    <input type="text" name="priority" id="priority" placeholder="Priority"
           value="{{ $task->priority }}">

    <label for ="status">Status:</label>
    <input type="text" name="status" id="status" placeholder="Status"
           value="{{ $task->status }}">

    <button type="submit">Update Task</button>

</form>