@php
    $html_tag_data = [];
    $title = 'Notificaciones';
    $description= 'Lista de notificaciones push'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    {{-- <script src="/js/cs/checkall.js"></script> --}}
    {{-- <script src="/js/pages/products.list.js"></script> --}}
@endsection





@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                               <h1>
                                {{"Listado de Notificaciones"}}
                                </h1> 
                            </span>

                             <div class="float-right">
                                <a href="{{route('notification.new') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                     
                                        
										<th>Icono</th>
										<th>Titulo</th>
										<th>Mensaje</th>
										<th>Fecha</th>
										<th>Enlace</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($datos as $dato)
                                   
                                        <tr>
                                           

                                            <td>  <img class="img-thumbnail img-fluid" src="../storage/{{$dato->icon}}" class="img-thumbnail" width="100" alt=""></td>
											<td>{{ $dato->icon }}</td>
											<td>{{ $dato->title }}</td> 
										    <td>{{$dato->body}}</td>
                                            <td>{{ $dato->date }}</td>
                                            <td>{{ $dato->link }}</td>

                                         

                                            

											{{-- <td>{{ isset($mensajesSoporte->product->name) ? $mensajesSoporte->product->name: 'No definido' }}</td> --}}
											@if ($user->status == 0)
                                            <td><span class="badge bg-danger px-3">Inactivo</span></td>
                                               @else 
                                            <td><span class="badge bg-success px-3">Activo</span></td>

                                            @endif


                                            <td class="text-end">
                                                <form action="{{ route('user.delete',$user->id) }}" method="GET">
                                                    <a class="btn btn-sm btn-success" href="{{ route('user.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                  
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
                {!! $datos->links() !!}
            </div>
        </div>
    </div>
@endsection