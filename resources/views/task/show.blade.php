@extends('layouts.app')

@section('template_title')
    {{ $task->name ?? 'Show Task' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Task</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $task->name }}
                        </div>
                        <div class="form-group">
                            <strong>Tipotarea:</strong>
                            {{ $task->tipoTarea }}
                        </div>
                        <div class="form-group">
                            <strong>Horainicio:</strong>
                            {{ $task->horaInicio }}
                        </div>
                        <div class="form-group">
                            <strong>Horafin:</strong>
                            {{ $task->horaFin }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $task->description }}
                        </div>
                        <div class="form-group">
                            <strong>Contacto Id:</strong>
                            {{ $task->contacto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $task->product_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
