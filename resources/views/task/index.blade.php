@php
$html_tag_data = [];
$title = 'Lista de tareas';
$description= 'Ecommerce tasks List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/products.list.js"></script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">

                    <h2>{{$title}}</h2>

                    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                        {{"Crear" }}
                    </a>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="card-body">
                {{-- <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    
                                    <th>Name</th>
                                    <th>Tipotarea</th>
                                    <th>Horainicio</th>
                                    <th>Horafin</th>
                                    <th>Description</th>
                                    <th>Contacto Id</th>
                                    <th>Product Id</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ ++$i }}</td>

                <td>{{ $task->name }}</td>
                <td>{{ $task->tipoTarea }}</td>
                <td>{{ $task->horaInicio }}</td>
                <td>{{ $task->horaFin }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->contacto_id }}</td>
                <td>{{ $task->product_id }}</td>

                <td>
                    <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                        <a class="btn btn-sm btn-primary " href="{{ route('tasks.show',$task->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                        <a class="btn btn-sm btn-success" href="{{ route('tasks.edit',$task->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                    </form>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div> --}}
        </div>


        <div class="row">
            <div class="col-sm-4">
                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <h4 class="card-title text-center btn-lg btn-primary">PENDIENTES</h4>
                    </div>


                    @foreach ($tasks as $task)

                    @if ($task->status == "Pendiente")




                    <div class="card-body cardBoard">

                        <h5 class="card-title">#.{{$task->id." ".$task->name }}</h5>
                        <p class="card-text">{{$task->description }}</p>
                        <p>Fecha de Inicio: {{$task->horaInicio }}</p>
                        <p>Fecha de Culminación: {{$task->horaFin }}</p>

                        <div class="table-responsive">

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>



                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="user" class="icon" data-acorn-size="20"></i>
                                        </td>

                                        <td class="card-title"><span>{{"".$task->contacto->name." ".$task->contacto->apellido }} </span></td>


                                        <td class="text-end">
                                            @if ($task->tipoTarea == 'Contacto')
                                            <span class="badge bg-success">{{ $task->tipoTarea }}</span>
                                            @elseif($task->tipoTarea == 'Visita')
                                            <span class="badge bg-warning">{{ $task->tipoTarea }}</span>
                                            @else
                                            <span class="badge bg-info">{{ $task->tipoTarea }}</span>


                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="email" class="icon" data-acorn-size="20"></i>
                                        </td>
                                        <td class="card-title"><span>{{"".$task->contacto->email}} </span></td>

                                        <td class="text-center">

                                            <div class="dropdown">
                                                <i data-acorn-icon="edit" style="color:cyan" data-acorn-size="14" class="dropdown-toggle icon  " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                                </i>
                                                <ul class="dropdown-menu">
                                                    <li>

                                                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>2,'taskId'=>$task->id])}}">
                                                            <span class="align-middle d-inline-block">Enviar A en Proceso</span>
                                                        </a>

                                                    </li>
                                                    <li>

                                                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>3,'taskId'=>$task->id])}}">
                                                            <span class="align-middle d-inline-block">Enviar A Completado</span>
                                                        </a>

                                                    </li>
                                                    <li>

                                                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>1,'taskId'=>$task->id])}}">
                                                            <span class="align-middle d-inline-block">Enviar A pendiente</span>
                                                        </a>

                                                    </li>



                                                </ul>
                                            </div>


                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="phone" class="icon" data-acorn-size="20"></i>
                                        </td>

                                        <td class="card-title"><span>{{"".$task->contacto->telefonoContacto1}} </span></td>

                                        <td class="text-center">


                                            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn-danger "><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="home-garage" class="icon" data-acorn-size="20"></i>
                                        </td>

                                        <td colspan="2" class="card-title"><span>{{"".$task->product->name}} </span></td>


                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="alarm" class="icon" data-acorn-size="20"></i>
                                        </td>
                                        <td colspan="2" class="card-title"><span>{{$task->created_at->diffForHumans()}} </span></td>


                                    </tr>



                                </tbody>
                            </table>
                        </div>



                    </div>
                    @endif


                    @endforeach


                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <h4 class="card-title text-center btn-lg btn-primary">EN PROCESO</h4>
                    </div>

                    @foreach ($tasks as $task)

                    @if ($task->status == "En proceso")




                    <div class="card-body cardBoard">

                        <h5 class="card-title">#.{{$task->id." ".$task->name }}</h5>
                        <p class="card-text">{{$task->description }}</p>
                        <p>Fecha de Inicio: {{$task->horaInicio }}</p>
                        <p>Fecha de Culminación: {{$task->horaFin }}</p>

                        <div class="table-responsive">

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>



                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="user" class="icon" data-acorn-size="20"></i>
                                        </td>

                                        <td class="card-title"><span>{{"".$task->contacto->name." ".$task->contacto->apellido }} </span></td>


                                        <td class="text-end">
                                            @if ($task->tipoTarea == 'Contacto')
                                            <span class="badge bg-success">{{ $task->tipoTarea }}</span>
                                            @elseif($task->tipoTarea == 'Visita')
                                            <span class="badge bg-warning">{{ $task->tipoTarea }}</span>
                                            @else
                                            <span class="badge bg-info">{{ $task->tipoTarea }}</span>


                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="email" class="icon" data-acorn-size="20"></i>
                                        </td>
                                        <td class="card-title"><span>{{"".$task->contacto->email}} </span></td>

                                        <td class="text-center">

                                            <div class="dropdown">
                                                <i data-acorn-icon="edit" style="color:cyan" data-acorn-size="14" class="dropdown-toggle icon  " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                                </i>
                                                <ul class="dropdown-menu">
                                                    <li>

                                                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>2,'taskId'=>$task->id])}}">
                                                            <span class="align-middle d-inline-block">Enviar A en Proceso</span>
                                                        </a>

                                                    </li>
                                                    <li>

                                                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>3,'taskId'=>$task->id])}}">
                                                            <span class="align-middle d-inline-block">Enviar A Completado</span>
                                                        </a>

                                                    </li>
                                                    <li>

                                                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>1,'taskId'=>$task->id])}}">
                                                            <span class="align-middle d-inline-block">Enviar A pendiente</span>
                                                        </a>

                                                    </li>



                                                </ul>
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="phone" class="icon" data-acorn-size="20"></i>
                                        </td>

                                        <td class="card-title"><span>{{"".$task->contacto->telefonoContacto1}} </span></td>

                                        <td class="text-center">


                                            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn-danger "><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="home-garage" class="icon" data-acorn-size="20"></i>
                                        </td>

                                        <td colspan="2" class="card-title"><span>{{"".$task->product->name}} </span></td>


                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="alarm" class="icon" data-acorn-size="20"></i>
                                        </td>
                                        <td colspan="2" class="card-title"><span>{{$task->created_at->diffForHumans()}} </span></td>


                                    </tr>



                                </tbody>
                            </table>
                        </div>



                    </div>
                    @endif


                    @endforeach







                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <h4 class="card-title text-center btn-lg btn-primary">COMPLETADA</h4>
                    </div>

                    @foreach ($tasks as $task)

                    @if ($task->status == "Completado")




                    <div class="card-body cardBoard">

                        <h5 class="card-title">#.{{$task->id." ".$task->name }}</h5>
                        <p class="card-text">{{$task->description }}</p>
                        <p>Fecha de Inicio: {{$task->horaInicio }}</p>
                        <p>Fecha de Culminación: {{$task->horaFin }}</p>

                        <div class="table-responsive">

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>



                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="user" class="icon" data-acorn-size="20"></i>
                                        </td>

                                        <td class="card-title"><span>{{"".$task->contacto->name." ".$task->contacto->apellido }} </span></td>


                                        <td class="text-end">
                                            @if ($task->tipoTarea == 'Contacto')
                                            <span class="badge bg-success">{{ $task->tipoTarea }}</span>
                                            @elseif($task->tipoTarea == 'Visita')
                                            <span class="badge bg-warning">{{ $task->tipoTarea }}</span>
                                            @else
                                            <span class="badge bg-info">{{ $task->tipoTarea }}</span>


                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="email" class="icon" data-acorn-size="20"></i>
                                        </td>
                                        <td class="card-title"><span>{{"".$task->contacto->email}} </span></td>

                                        <td class="text-center">

                                            <div class="dropdown">
                                                <i data-acorn-icon="edit" style="color:cyan" data-acorn-size="14" class="dropdown-toggle icon  " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                                </i>
                                                <ul class="dropdown-menu">
                                                    <li>

                                                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>2,'taskId'=>$task->id])}}">
                                                            <span class="align-middle d-inline-block">Enviar A en Proceso</span>
                                                        </a>

                                                    </li>
                                                    <li>

                                                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>3,'taskId'=>$task->id])}}">
                                                            <span class="align-middle d-inline-block">Enviar A Completado</span>
                                                        </a>

                                                    </li>
                                                    <li>

                                                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>1,'taskId'=>$task->id])}}">
                                                            <span class="align-middle d-inline-block">Enviar A pendiente</span>
                                                        </a>

                                                    </li>



                                                </ul>
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="phone" class="icon" data-acorn-size="20"></i>
                                        </td>

                                        <td class="card-title"><span>{{"".$task->contacto->telefonoContacto1}} </span></td>

                                        <td class="text-center">


                                            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn-danger "><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="home-garage" class="icon" data-acorn-size="20"></i>
                                        </td>

                                        <td colspan="2" class="card-title"><span>{{"".$task->product->name}} </span></td>


                                    </tr>
                                    <tr>
                                        <td>
                                            <i data-acorn-icon="alarm" class="icon" data-acorn-size="20"></i>
                                        </td>
                                        <td colspan="2" class="card-title"><span>{{$task->created_at->diffForHumans()}} </span></td>


                                    </tr>



                                </tbody>
                            </table>
                        </div>



                    </div>
                    @endif


                    @endforeach





                </div>
            </div>
        </div>
    </div>
    {!! $tasks->links() !!}
</div>
</div>
</div>
@endsection