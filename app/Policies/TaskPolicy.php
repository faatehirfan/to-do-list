<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; //authenticated user can view tasks papge.
    }

    /**
     * Determine whether the user can view specific tasks.
     */
    public function view(User $user, Task $task): bool
    {
        return $user->id === $task->user_id; // Only the owner can view
    }

    /**
     * Determine whether the user can create tasks.
     */
    public function create(User $user): bool
    {
        return true; //authenticated user can create tasks.
    }

    /**
     * Determine whether the user can update the tasks.
     */
    public function update(User $user, Task $task): bool
    {
        return $user->id === $task->user_id; // Only the owner can update
    }

    /**
     * Determine whether the user can delete the tasks.
     */
    public function delete(User $user, Task $task): bool
    {
        return $user->id === $task->user_id; // Only the owner can delete
    }

}
