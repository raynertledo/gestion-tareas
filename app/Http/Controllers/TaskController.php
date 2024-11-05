<?php

namespace App\Http\Controllers;

use App\Models\Task; // Importa el modelo Task
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all(); // Obtiene todas las tareas de la base de datos
        return view('tasks.index', compact('tasks')); // Retorna la vista con las tareas
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create'); // Retorna la vista de creación de tareas
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos de entrada
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        // Crea una nueva tarea con los datos del formulario
        Task::create($request->all());

        // Redirige a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task')); // Retorna la vista de detalles de una tarea específica
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task')); // Retorna la vista de edición con la tarea específica
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Valida los datos de entrada
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        // Actualiza la tarea con los datos del formulario
        $task->update($request->all());

        // Redirige a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // Elimina la tarea de la base de datos
        $task->delete();

        // Redirige a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada con éxito.');
    }

    /**
     * Updates the specified task's status.
     */
    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:Pendiente,Trabajando,Revision,Completada'
        ]);

        $task->status = $request->input('status');
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Estado de la tarea actualizado con éxito.');
    }

}
