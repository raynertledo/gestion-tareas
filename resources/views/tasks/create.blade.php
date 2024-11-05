@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Nueva Tarea</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
@endsection
