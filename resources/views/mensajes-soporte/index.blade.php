@php
$html_tag_data = [];
$title = 'Lista de mensajes';
$description= 'Ecommerce tasks List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<!-- <script src="/js/cs/checkall.js"></script>
<script src="/js/pages/products.list.js"></script> -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                               <h2>{{$title}}</h2> 
                             <div class="float-right">
                                <a href="{{ route('mensajes-soportes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{"Agregar Nuevo" }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Asunto</th>
										<th>Descripcion</th>
										<th>Prioridad</th>
										<th>Estado</th>
										<th>Propiedad</th>
										<th>Contacto</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mensajesSoportes as $mensajesSoporte)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            
											<td>{{ $mensajesSoporte->asuntoticket }}</td>
											<td>{{ $mensajesSoporte->descripcionticket }}</td>
                                            @if ($mensajesSoporte->prioridadticket == 'Media')

											<td> <span class="badge bg-warning px-3">Media</span></td>

                                           

                                            @elseif($mensajesSoporte->prioridadticket == 'Alta')

                                            <td> <span class="badge bg-danger px-3">Alta</span></td>
                                           

                                            @else

                                            <td>   <span class="badge bg-info px-3">Baja</span></td>
                                         

                                                
                                            @endif

                                            @if ($mensajesSoporte->estadoticket == 'En Proceso')
                                            <td>   <span class="badge bg-info px-3">En Proceso</span></td>
                                                @elseif($mensajesSoporte->estadoticket == 'Abierto')
                                            <td>   <span class="badge bg-success px-3">Abierto</span></td>
                                                @elseif($mensajesSoporte->estadoticket == 'Cerrado')
                                            <td>   <span class="badge bg-danger px-3">Cerrado</span></td>



                                                
                                            @endif

											<td>{{ isset($mensajesSoporte->product->name) ? $mensajesSoporte->product->name: 'No definido' }}</td>
											<td>{{ $mensajesSoporte->contactoUser->email }}</td>

                                            <td class="text-end">
                                                <form action="{{ route('mensajes-soportes.destroy',$mensajesSoporte->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('mensajes-soportes.show',$mensajesSoporte->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('mensajes-soportes.edit',$mensajesSoporte->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $mensajesSoportes->links() !!}
            </div>
        </div>
    </div>
@endsection
