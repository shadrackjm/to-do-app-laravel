<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller //control
{
    public function home(Request $request)
    {
        $tasks = Task::all();
        return view("task-page", compact("tasks"));
        // return view("task-page",["tasks"=>$tasks]);
    }

    public function index()
    {
        return view("task-form");
    }

    public function store(Request $request)
    {
        $request->validate([
            "task_name" => "required",
            "task_description" => "required",
        ]);

        try {
            $task = new Task();
            $task->name = $request->task_name;
            $task->description = $request->task_description;
            $task->save();

            return redirect('/')->with("success", "task added successfully");
        } catch (\Exception $exception) {
            return redirect('/')->with("error", $exception->getMessage());
        }

    }
}
