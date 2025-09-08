<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{   
    public function index() {
        $tasks = Task::latest()->get();
        return view('dashboard', ['tasks' => $tasks]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Task::create($data);

        return redirect()->back()->with('success', 'Task added successfully!');
    }

    public function update(Request $request, Task $task) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $task->update($data);
        
        return redirect()->route('dashboard');
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('dashboard');
    }
}
