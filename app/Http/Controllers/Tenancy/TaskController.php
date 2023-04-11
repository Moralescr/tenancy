<?php

namespace App\Http\Controllers\Tenancy;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate(5);
        return view('tenancy.tasks.index', compact('tasks'));
    }

    /**
     * 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenancy.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required:image',
        ]);

        $date['image_url'] = Storage::put('tasks', $request->file('image_url'));

        Task::create($data);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tenancy.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tenancy.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //Data validations
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'nullable:image',
        ]);

        //Check if the image is being sent
        if ($request->hasFile('image_url')) {
            //Delete previous image
            Storage::delete($task->image_url);

            //Save a new image
            $data['image_url'] = Storage::put('tasks', $request->file('image_url'));
        }

        $task->update($data);

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Storage::delete($task->image_url);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}