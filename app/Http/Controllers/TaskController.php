<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Tâche créée avec succès!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

   public function update(Request $request, Task $task)
{
    $request->validate(['title' => 'required|string']);
    $task->update(['title' => $request->title]);

    return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour.');
}

public function destroy(Task $task)
{
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Tâche supprimée.');
}

    public function toggle(Task $task)
    {
        $task->update(['completed' => !$task->completed]);
        
        return redirect()->route('tasks.index')
            ->with('success', 'Statut de la tâche mis à jour!');
    }
}