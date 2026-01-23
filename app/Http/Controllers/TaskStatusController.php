<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskStatuses = TaskStatus::orderBy('created_at', 'asc')->get();

        return Inertia::render('TaskStatuses/Index', [
            'taskStatuses' => $taskStatuses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('TaskStatuses/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        TaskStatus::create($request->all());

        return redirect()->route('status.index')->with('success', 'Task status created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskStatus $taskStatus)
    {
        return Inertia::render('TaskStatuses/Show', [
            'status' => $taskStatus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        return Inertia::render('TaskStatuses/Edit', [
            'status' => $taskStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskStatus $taskStatus)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $taskStatus->update($request->all());

        return redirect()->route('status.show', $taskStatus->id)->with('success', 'Task status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus)
    {
        $taskStatus->delete();

        return redirect()->route('status.index')->with('success', 'Task status deleted successfully');
    }
}
