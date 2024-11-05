@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Tareas</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Agregar Nueva Tarea</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            <form action="{{ route('tasks.updateStatus', $task) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()">
                                    <option value="Pendiente" {{ $task->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="Trabajando" {{ $task->status == 'Trabajando' ? 'selected' : '' }}>Trabajando</option>
                                    <option value="Revision" {{ $task->status == 'Revision' ? 'selected' : '' }}>Revisión</option>
                                    <option value="Completada" {{ $task->status == 'Completada' ? 'selected' : '' }}>Completada</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Editar</a>
                            <button type="button" class="btn btn-danger delete-button" data-url="{{ route('tasks.destroy', $task) }}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
