<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Product;
use App\Models\Contacto;


use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tasks.index')->only('index');
        $this->middleware('can:admin.tasks.create')->only('create', 'store');
        $this->middleware('can:admin.tasks.edit')->only('edit', 'update');
        $this->middleware('can:admin.tasks.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate();

        return view('task.index', compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * $tasks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();

        $products = Product::all()->pluck('name','id');
        $contactos = Contacto::all()->pluck('name','id');

        return view('task.create', compact('task','products','contactos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Task::$rules);

        $task = Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $products = Product::all()->pluck('name','id');
        $contactos = Contacto::all()->pluck('name','id');

        return view('task.edit', compact('task','products','contactos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        request()->validate(Task::$rules);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea Actualizada con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $task = Task::find($id)->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada con exito');
    }

    public function taskStatus($id,$taskId)
    {
        $task = Task::find($taskId);
        if($id == 1)
        {
            $task->status = 'Pendiente';
        }elseif($id ==2)
        {
            $task->status ='En proceso';
        }else{
            $task->status ='Completado';

        }

        $task->save();

        return redirect()->back();

        
    }
}
