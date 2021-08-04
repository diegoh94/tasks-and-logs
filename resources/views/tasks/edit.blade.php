@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@if (session('notification'))
              <div class="alert alert-success my-4">
                <p>{{ session('notification') }}</p>
              </div>
            @endif
            <div class="card">
                <div class="card-header">Editar tarea</div>

                <div class="card-body">     
                	<form method="POST">
                		@csrf 		
                		@method('PUT')
                		<div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $task->description }}" required autocomplete="description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deadline" class="col-md-4 col-form-label text-md-right">Fecha límite</label>
                            <div class="col-md-6">
                                <input id="deadline" type="date" class="form-control" name="deadline" value="{{ $task->deadline }}" required autocomplete="deadline">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_assigning_id" class="col-md-4 col-form-label text-md-right">Usuario asignado</label>
                            <div class="col-md-6">
                                <select name="user_assigning_id" class="form-select form-control" aria-label="Default select example">
								  @foreach($users as $user)
								  <option value="{{ $user->id }}" @if($task->user_assigning_id === $user->id) selected='selected' @endif>{{ $user->name }}</option>
								  @endforeach
								</select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url('/home') }}" class="btn btn-secondary">
                                    Volver
                                </a>
                                <button type="submit" class="btn btn-success">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
