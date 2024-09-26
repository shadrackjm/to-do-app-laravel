<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller //control
{
    public function welcomepage(){
        return view("welcome");
    }
    public function home(Request $request)
    {
        //fetch task associated with authenticated user only
        //$tasks = Task::all();
        $tasks = Task::where('user_id', Auth::user()->id)->get();
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
            //create a new task and associate with a authenticated user
            $task = new Task();
            $task->name = $request->task_name;
            $task->description = $request->task_description;
            $task->user_id = Auth::id(); //set user_id to ID of the authenticated user
            $task->save();

            return redirect('/task/page')->with("success", "task added successfully");
        } catch (\Exception $exception) {
            return redirect('/task/page')->with("error", $exception->getMessage());
        }

    }

    //edit form
    public function show($task_id)
    {
        $task = Task::find($task_id); //id == 1
        // $task = Task::where('id',$id)->first(); //id == 1
        return view("edit-task", compact("task"));
    }

    public function edit(Request $request)
    {
        try {
            $task = Task::find($request->task_id);

            $task->name = $request->task_name;
            $task->description = $request->task_description;
            $task->save();

            return redirect("/task/page")->with("success", "successfully updated the your task");
        } catch (\Exception $exception) {
            return redirect("/task/page")->with("error", $exception->getMessage());
        }

    }

    public function delete($task_id)
    {
        try {
            $task = Task::find($task_id);
            $task->delete();
            return redirect("/task/page")->with("success", "successfully deleted the your task");
        } catch (\Exception $exception) {
            return redirect("/task/page")->with("error", $exception->getMessage());
        }

    }
    public function admin(){
        return view('admin.admindashboard');
    }
}
