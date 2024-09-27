<?php

namespace App\Http\Controllers;

use App\Models\Task; // Import the Task model

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        // Fetch all tasks for admin users
        $tasks = Task::all();

        // Return the admin task view with all tasks
        return view('task-page', compact('tasks'));
    }

    
}
