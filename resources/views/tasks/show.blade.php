@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">Ver tarea</div>
            	<div class="card-body">      		
            		<input type="hidden" name="user_created_id" value="{{Auth::id()}}">
            		<div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>
                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control" name="description" value="{{ $task->description }}" required autocomplete="description" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deadline" class="col-md-4 col-form-label text-md-right">Fecha límite</label>
                        <div class="col-md-6">
                            <input id="deadline" type="date" class="form-control" name="deadline" value="{{ $task->deadline }}" required autocomplete="deadline" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_assigning_id" class="col-md-4 col-form-label text-md-right">Usuario asignado</label>
                        <div class="col-md-6">
                            <select name="user_assigning_id" class="form-select form-control" aria-label="Default select example" disabled>
							  @foreach($users as $user)
							  <option value="{{ $user->id }}" @if($task->user_assigning_id === $user->id) selected='selected' @endif>{{ $user->name }}</option>
							  @endforeach
							</select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ url('home') }}" class="btn btn-secondary">
                                Atrás 
                            </a>
                            <a href="{{ url('/tareas/'.$task->id.'/editar') }}" class="btn btn-primary">
                                Editar
                            </a>
                        </div>
                    </div>
            	</div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registros</div>
                <div class="card-body">      		
        			        	
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection
