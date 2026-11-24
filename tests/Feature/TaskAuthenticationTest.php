<?php

use App\Models\Task;
use App\Models\User;

test('unauthenticated guests are redirected to login when visiting tasks', function () {
    $response = $this->get('/tasks');

    $response->assertRedirect('/login');
});

test('authenticated users can view their own tasks', function () {
    $user = User::factory()->create();
    $task = Task::create([
        'user_id' => $user->id,
        'title' => 'My Secret Task',
        'priority' => 'High',
        'status' => 'Pending',
    ]);

    $response = $this->actingAs($user)->get('/tasks');

    $response->assertStatus(200);
    $response->assertSee('My Secret Task');
});

test('users cannot view or edit tasks belonging to other users', function () {
    $alice = User::factory()->create();
    $bob = User::factory()->create();

    $alicesTask = Task::create([
        'user_id' => $alice->id,
        'title' => 'Alice Private Task',
        'priority' => 'Medium',
        'status' => 'Pending',
    ]);

    // Bob tries to edit Alice's task -> Policy should block with 403 Forbidden
    $response = $this->actingAs($bob)->get("/tasks/{$alicesTask->id}/edit");

    $response->assertStatus(403);
});

test('users cannot delete tasks belonging to other users', function () {
    $alice = User::factory()->create();
    $bob = User::factory()->create();

    $alicesTask = Task::create([
        'user_id' => $alice->id,
        'title' => 'Alice Task to Delete',
        'priority' => 'Low',
        'status' => 'Pending',
    ]);

    // Bob tries to delete Alice's task -> Policy should block with 403 Forbidden
    $response = $this->actingAs($bob)->delete("/tasks/{$alicesTask->id}");

    $response->assertStatus(403);
    $this->assertDatabaseHas('tasks', ['id' => $alicesTask->id]);
});