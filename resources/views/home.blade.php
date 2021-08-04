@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('notification'))
                <div class="alert alert-success my-4">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{ session('notification') }}</p>
                </div>
            @endif

            <div class="card">
                <div class="card-header">Lista de tareas</div>

                <div class="card-body">
                    <div class="">
                        <a href="{{ url('tareas/registrar') }}" class="btn btn-success mb-3">Nueva tarea</a>                    
                    </div>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripción</th>
                                <th>Creado por</th>
                                <th>Usuario asignado</th>
                                <th>Fecha límite</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <th>{{ $task->id }}</th>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->user_created->name}}</td>
                                <td>{{ $task->user_assigning->name}}</td>
                                <td>{{ $task->deadline}}</td>
                                <td>
                                    <a href="{{ url('/tareas/'.$task->id.'/ver') }}" class="btn btn-secondary">Ver</a>
                                    <a href="{{ url('/tareas/'.$task->id.'/editar') }}" class="btn btn-primary">Editar</a>
                                    <form style="display: inline-block;" action="/tareas/{{ $task->id }}/eliminar" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Archivar" data-toggle="tooltip" data-placement="top">Eliminar</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
