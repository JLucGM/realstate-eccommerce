<div class="box box-info padding-1">
    <div class="box-body row">

    
      
        
          <div class="form-group col-sm-6 mb-4">
            {{ Form::label('name','Nombre del negocio',['class'=>'mb-4']) }}
            {{ Form::text('name', $negocio->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
      <div class="form-group col-sm-6 mb-4">

            {{ Form::label('status','Estatus',['class'=>'mb-4'])  }}
            {{ Form::select('status',[

            'Nuevos' => 'Nuevos',
            'Contactado' => 'Contactado',
            'Presentacion Inmueble' => 'Presentacion Inmueble',
            'Pre-seleccion' => 'Pre-seleccion',
            'Negociacion' => 'Negociacion',
            'Cierre' => 'Cierre',


         ],null, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Estatus']) }}
            {!! $errors->first('estatus', '<div class="invalid-feedback">:message</div>') !!}
        </div>
           <div class="form-group col-sm-6 mb-4">
            {{ Form::label('presupuestoTotal','Presupuesto',['class'=>'mb-4']) }}
            {{ Form::text('presupuestoTotal', $negocio->presupuestoTotal, ['class' => 'form-control' . ($errors->has('presupuestoTotal') ? ' is-invalid' : ''), 'placeholder' => 'Presupuestototal']) }}
            {!! $errors->first('presupuestoTotal', '<div class="invalid-feedback">:message</div>') !!}
        </div>



  <div class="form-group col-sm-6 mb-4">
            {{ Form::label('contacto_id','Contacto',['class'=>'mb-4']) }}
            {{ Form::select('contacto_id',$contactos, $negocio->contacto_id, ['class' => 'form-control' . ($errors->has('contacto_id') ? ' is-invalid' : ''), 'placeholder' => 'Contacto']) }}
            {!! $errors->first('contacto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
<div class="form-group col-sm-6 mb-4">
            {{ Form::label('propiedad_id','Propiedad',['class'=>'mb-4']) }}
            {{ Form::select('propiedad_id',$propiedades, $negocio->propiedad_id, ['class' => 'form-control' . ($errors->has('propiedad_id') ? ' is-invalid' : ''), 'placeholder' => 'Propiedad']) }}
            {!! $errors->first('propiedad_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
      <div class="form-group col-sm-6 mb-4">
            {{ Form::label('agente_id','Agente',['class'=>'mb-4']) }}
            {{ Form::select('agente_id',$agente, $negocio->agente_id, ['class' => 'form-control' . ($errors->has('agente_id') ? ' is-invalid' : ''), 'placeholder' => 'Agente']) }}
            {!! $errors->first('agente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group col-sm-2 mb-4">
            {{ Form::label('cantidadDormitorios','Cantidad De Dormitorios',['class'=>'mb-4']) }}
            {{ Form::number('cantidadDormitorios', $negocio->cantidadDormitorios, ['class' => 'form-control' . ($errors->has('cantidadDormitorios') ? ' is-invalid' : ''), 'placeholder' => 'Cantidaddormitorios']) }}
            {!! $errors->first('cantidadDormitorios', '<div class="invalid-feedback">:message</div>') !!}
        </div>
      <div class="form-group col-sm-2 mb-4">
            {{ Form::label('cantidadBaños','Cantidad De Baños',['class'=>'mb-4']) }}
            {{ Form::number('cantidadBaños', $negocio->cantidadBaños, ['class' => 'form-control' . ($errors->has('cantidadBaños') ? ' is-invalid' : ''), 'placeholder' => 'Cantidadbaños']) }}
            {!! $errors->first('cantidadBaños', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
 <div class="box-footer mt20 offset-4">
      <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>

    </div>
</div>