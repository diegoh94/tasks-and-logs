<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function create() {    	
        $users = User::all();    	
        return view('tasks.create')->with(compact('users'));
    }

    public function store(Request $request) {
    	
        $data = $request->validate([
            'description' => 'required|min:3',
            'deadline' => 'required|date_format:Y-m-d|after_or_equal:now',
            'user_assigning_id' => 'required|exists:users,id'
        ]/*, [
            'description.required' => 'Es necesario ingresar una descripción',

        ]*/);

        $data['user_created_id'] = auth()->id();

    	Task::create($data);

        session()->flash('notification', 'Su registro ha sido exitoso');
        return redirect('/home');

    }

    public function show(Task $task) {   

        if (auth()->id() !== $task->user_assigning_id) {
            session()->flash('warning', 'No puedes acceder a una tarea que no tienes asignada');
            return back();
        }

        $users = User::all();
        
        return view('tasks.show', compact('task','users'));
    }

    public function edit(Task $task) {

        if (auth()->id() !== $task->user_assigning_id) {
            session()->flash('warning', 'No puedes editar una tarea que no tienes asignada');
            return back();
        }
        
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
        if (auth()->id() !== $task->user_assigning_id) {
            session()->flash('warning', 'No puedes eliminar una tarea que no tienes asignada');
            return back();
        }

        $task->delete(); 
        session()->flash('notification', 'La tarea ha sido eliminada');

        return back();
    }
}
