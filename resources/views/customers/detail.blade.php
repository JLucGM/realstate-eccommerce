@php
$html_tag_data = [];
$title = 'Editar de usuario';
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
    <h2>Editar Usuario</h2>
    <h2 class="text-success">{{$message}}</h2>
    <div class="row">
        <div class="col-12 mb-0">
            <div id="checkboxTable">
                <div class="contenedor">
                    <div class="card">

                        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch']) !!}

                        {{ method_field('PATCH') }}
                        @csrf

                        <div class="box box-info p-3">
                            <div class="box-body row">

                                <div class="form-group col-sm-6 mb-4">
                                    {{ Form::label('name','Nombre',['class'=>'mb-4']) }}
                                    {{ Form::text('name',null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre']) }}
                                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-sm-6 mb-4">
                                    {{ Form::label('last_name','Apellido',['class'=>'mb-4']) }}
                                    {{ Form::text('last_name',null, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'apellido']) }}
                                    {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>


                                <div class="form-group col-sm-6 mb-4">
                                    {{ Form::label('rol','Rol',['class'=>'mb-4']) }}
                                    <select class="form-control" name="rol" id="rol">
                                        @foreach ($roles as $rol)
                                        <option value="{{$rol->rol}}">{{$rol->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-sm-6 mb-4">
                                    {{ Form::label('email','Email',['class'=>'mb-4']) }}
                                    {{ Form::text('email',null,['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'correo']) }}
                                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-sm-6 mb-4">
                                    {{ Form::label('password','Contraseña',['class'=>'mb-4']) }}
                                    {{ Form::password('password',['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'contraseña']) }}
                                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-sm-6 mb-4">
                                    {{ Form::label('whatsapp','Whatsapp',['class'=>'mb-4']) }}
                                    {{ Form::text('whatsapp',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'whatsapp']) }}
                                    {!! $errors->first('whatsapp', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                {{--<div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('link_facebook','Facebook',['class'=>'mb-4']) }}
                                {{ Form::text('link_facebook',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'link de facebook']) }}
                                {!! $errors->first('facebook', '<div class="invalid-feedback">:message</div>') !!}


                                <div class="form-group col-sm-6 mb-4">
                                    {{ Form::label('link_instagram','Instagram',['class'=>'mb-4']) }}
                                    {{ Form::text('link_instagram',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'whatsapp']) }}
                                    {!! $errors->first('link_instagram', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-sm-6 mb-4">
                                    {{ Form::label('link_twitter','Twitter',['class'=>'mb-4']) }}
                                    {{ Form::text('link_twitter',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'whatsapp']) }}
                                    {!! $errors->first('link_twitter', '<div class="invalid-feedback">:message</div>') !!}
                                </div>--}}



                                <div class="form-group col-sm-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input " name="status" type="checkbox" {{ $user->status ? 'checked' : ''  }} role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                    </div>
                                </div>


                            </div>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Customers List End -->
    </div>
    @endsection