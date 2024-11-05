@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Tarea</h1>
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
@endsection
