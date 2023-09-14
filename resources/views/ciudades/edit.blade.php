@php
$html_tag_data = [];
$title = 'Editar ciudad';
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
<div class="container">
    <!-- Title and Top Buttons Start -->
    <!-- Customers List Start -->
    <h1 class="success">{{$message}}</h1>
    <div class="row">
        <div class="col-12 mb-0">
            <div class="card">

                <div class="card-header">
                    <h2>Editar Ciudad</h2>
                </div>

                {!! Form::model($city, ['route' => ['city.update', $city->id], 'method' => 'patch']) !!}

                {{ method_field('PATCH') }}
                @csrf

                <div class="card-body p-3">
                    <div class="row">
                        <div class="form-group col-sm-6 mb-4">
                            {{ Form::label('name','Nombre',['class'=>'form-label']) }}
                            {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'correo']) }}
                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="col-12 col-md-6">
                            {{ Form::label('estadoPerteneciente','Estado perteneciente',['class'=>'form-label']) }}
                            <select class="form-control" name="estado_id" id="estado_id">
                                @foreach ($estados as $estado)
                                <option value="{{$estado->id}}" {{ isset($city->estados) && $estado->id == $city->estados->id ? 'selected' : '' }}>{{$estado->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection