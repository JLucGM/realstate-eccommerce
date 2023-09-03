@extends('layouts.app')

@section('template_title')
    {{ $contactosPropiedad->name ?? 'Show Contactos Propiedad' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Contactos Propiedad</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contactos-propiedads.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tiporelacion:</strong>
                            {{ $contactosPropiedad->tipoRelacion }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $contactosPropiedad->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $contactosPropiedad->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Contacto Id:</strong>
                            {{ $contactosPropiedad->contacto_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
