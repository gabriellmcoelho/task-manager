<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $this->authorize('view', $project);
        $tasks = $project->tasks;
        return view('tasks.index', compact('tasks', 'project'));
    }

    public function create(Project $project)
    {
        $this->authorize('update', $project);
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $this->authorize('update', $project);
        $task = $project->tasks()->create($request->all());
        return redirect()->route('projects.tasks.index', $project);
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task->project);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task->project);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task->project);
        $task->update($request->all());
        return redirect()->route('projects.tasks.index', $task->project);
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task->project);
        $task->delete();
        return redirect()->route('projects.tasks.index', $task->project);
    }
}
