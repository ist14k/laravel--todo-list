<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Task;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Task $task)
    {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $task->notes()->create([
            'user_id' => $request->user()->id,
            'content' => $request->content
        ]);

        return redirect()->route('tasks.show', $task)
            ->with('success', 'Note added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $taskId = $note->task_id;
        $note->delete();

        return redirect()->route('tasks.show', $taskId)
            ->with('success', 'Note deleted successfully!');
    }
}
