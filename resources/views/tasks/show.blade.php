@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Tarea</h1>
        <div class="card">
            <div class="card-header">
                Tarea ID: {{ $task->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Título: {{ $task->title }}</h5>
                <p class="card-text">Descripción: {{ $task->description }}</p>
                <p class="card-text">Estado: {{ $task->status }}</p> <!-- Aquí se muestra el estado actualizado -->
                <a href="{{ route('tasks.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
@endsection
