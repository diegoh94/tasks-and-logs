<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\TaskLog;

use App\Mail\TaskLogCreated;
use Mail;

class TaskLogController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


	// Route model binding
    public function store(Request $request, Task $task) {
    	$data = $request->validate([
    		'comment' => 'required|min:5' 
    	]);

    	$data['task_id'] = $task->id;

    	TaskLog::create($data);

        Mail::to($task->user_created->email)
            ->send(new TaskLogCreated($task));

    	return back();
    }
}
