@php
    $html_tag_data = [];
    $title = 'Añadir ciudad';
    $description= 'Añadiendo ciudad'
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
    <h1>Crear Ciudad</h1>
    <h1 class="success">{{$message}}</h1>
    <div class="row">
        <div class="col-12 mb-0">
            <div id="checkboxTable">
                <div class="contenedor">
                    <div class="card">
                        
                      <form action="{{ route('city.store') }}" method="post">
                            @csrf
                            
                            
                            <div class="box box-info padding-1">
                                <div class="box-body row px-3 mt-1">
                                    
                                    
                                    
                                    
                                
                                    
                                    
                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('name','Nombre',['class'=>'mb-4']) }}
                                        {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'correo']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                   
                                    
                    
                                    
                                    
                                    <div class="form-group col-sm-6 mt-5">
                                        <div class="form-check">
                                            {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
                                            {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input']) !!}
                                            {!! Form::label('status', 'Estatus', ['class' => 'form-check-label']) !!}
                                        </div>
                                    </div>
                                   <div class="box-footer mt20 offset-4">
                                
      <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>

 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            
                        </script>
                    
                        
                    </div>
                </div>
            </div>

            
            
        </div>
        @endsection
        


