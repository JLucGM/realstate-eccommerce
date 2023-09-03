@php
$html_tag_data = [];
$title = 'Mostrar';
$description= 'Mostrar mensajes'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')

@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Mensaje de Soporte</span>
                    </div>
                    
                </div>
                
                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Asunto:</strong>
                        {{ $mensajesSoporte->asuntoticket }}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $mensajesSoporte->descripcionticket }}
                    </div>
                    <div class="form-group">
                        <strong>Prioridad:</strong>
                        @if ($mensajesSoporte->prioridadticket == 'Alta')
                        
                        <span class="badge bg-danger px-3">Alta</span>
                        @elseif($mensajesSoporte->prioridadticket == 'Media')
                        
                        <span class="badge bg-warning px-3">Media</span>
                        
                        @elseif($mensajesSoporte->prioridadticket == 'Baja')
                        
                        <span class="badge bg-info px-3">Baja</span>
                        
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        {{ $mensajesSoporte->estadoticket }}
                    </div>
                     <div class="form-group">
                        <strong>Propiedad:</strong>
                        {{ isset($mensajesSoporte->product->name) ? $mensajesSoporte->product->name:'No definido' }}
                    </div>
                    {{-- <div class="form-group">
                        <strong>Archivot:</strong>
                        {{ $mensajesSoporte->archivoticket }}
                    </div> --}}
                    <div class="form-group">
                        <strong>Contacto:</strong>
                        {{ $mensajesSoporte->contactoUser->email }}
                    </div>
                    
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th>MENSAJES:</th>
                                
                            </tr>
                        </thead>
                        
                    </table>

                      <div class="row" id="basic-table">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table p-5">
                                        <div class="card" style="height: 250px;">
                                            @foreach ($mensajes as $chat)
                                                <span></span>

                                                @if ($chat->sender_id == $user->id)
                                                    <div class="alert alert-secondary p-2"
                                                        style="margin-right: 50px; width: 50%; align-self: self-end;">
                                                        <small
                                                            class="float-left">{{ $chat->created_at->format('d/m/y h:i:a') }}</small>
                                                        <strong class="float-right">{{ $chat->sender->name }}</strong>
                                                        <br><span
                                                            class="text-muted float-right">{{ $chat->mensaje }}</span>
                                                    </div>
                                                @else
                                                    <div class="alert alert-primary p-2"
                                                        style="margin-left: 50px; width: 50%; align-self: self-start;">
                                                        <strong>{{ $chat->sender->name }}</strong><small
                                                            class="float-right">{{ $chat->created_at->format('d/m/y h:i:a') }}</small>
                                                        <br><span class="text-muted">{{ $chat->mensaje }}</span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </table>



                                </div>

                                <form method="POST" class="p-5"
                                    action="{{ route('ticketchats.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="mensaje">Mensaje:</label>
                                    <input type="text" name="mensaje" class="form-control">
                                    <input type="hidden" name="mensajes_soporte_id" value="{{ $mensajesSoporte->id }}" class="form-control">

                                    <div class="pt-2">
                                        <button type="submit" class="btn btn-primary">GUARDAR</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
            </div>
        </div>
    </div>
</section>
@endsection
