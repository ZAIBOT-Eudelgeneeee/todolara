<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{   
    public function index() {
        $tasks = Task::where('user_id', Auth::id())->latest()->get(); // FETCH TASKS PER USER USING ONE-TO-MANY
        return view('dashboard', ['tasks' => $tasks]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|nullable|string',
        ]);

        $validated['user_id'] = Auth::id(); // ADDING KEY-VALUE ['user_id'] AND RETURNING CURRENTLY LOGGED IN USERS

        Task::create($validated);

        return redirect()->back()->with('success', 'Task added successfully!');
    }

    public function update(Request $request, Task $task) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $task->update($validated);
        
        return redirect()->route('dashboard')->with('success', 'Task Updated successfully!');
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully!');
    }
}
