<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TaskLog;

class TaskLogController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


	// Route model binding
    public function store(Request $request, $taskId) {
    	$data = $request->validate([
    		'comment' => 'required|min:5' 
    	]);

    	$data['task_id'] = $taskId;

    	TaskLog::create($data);

    	return back();
    }
}
