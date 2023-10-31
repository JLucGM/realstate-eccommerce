@php
$html_tag_data = [];
$title = 'Lista de usuarios';
$description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Title and Top Buttons Start -->
    <!-- Customers List Start -->
    <div class="row">
        <div class="col-12 mb-0">
            <div class="card">
                <div class="card-header">
                    <h2>{{$title}}</h2>
                </div>
                <h1 class="success">{{$message}}</h1>
                <div class="card-body">
                <form action="{{ route('cat.store') }}" method="post">
                    @csrf
                    <div class="p-1">
                        <div class="row">

                            <div class="form-group col-12 col-md-6 mb-4">
                                {{ Form::label('name','Nombre',['class'=>'form-label']) }}
                                {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'correo']) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group col-12 col-md-6 mt-5">
                                <div class="form-check">
                                    {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
                                    {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input']) !!}
                                    {!! Form::label('status', 'Estatus', ['class' => 'form-check-label']) !!}
                                </div>
                            </div>

                            <div class="card-footer mt-2">
                                <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection