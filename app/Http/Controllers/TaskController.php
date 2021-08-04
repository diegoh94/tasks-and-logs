<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(){
    	
        $users = User::all();
    	return view('tasks.create')->with(compact('users'));;

    }

    public function store(Request $request) {
    	//dd($request);
        $data = $request->all();
        $data['user_created_id'] = auth()->id();

    	Task::create($data);

        session()->flash('notification', 'Su registro ha sido exitoso');
        return redirect('/home');

    }

    public function show($id){
        
        $task = Task::find($id);
        $users = User::all();

        return view('tasks.show',compact('task','users'));
    }

    public function edit($id){
        
        $task = Task::find($id);
        $users = User::all();

        return view('tasks.edit',compact('task','users'));   
    }

    public function update(Task $task, Request $request) {
        $task->update(
            $request->all()
        );
        
        session()->flash('notification', 'Los cambios se han guardado exitosamente');

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete(); // deleted_at
        session()->flash('notification', 'La tarea ha sido eliminada');

        return back();
    }
}
