<div class="box box-info padding-1">
    <div class="box-body row">
        
        
       <div class="form-group col-sm-6 mb-4">
            {{ Form::label('asuntoticket','Asunto',['class'=>'mb-4'])}}
            {{ Form::text('asuntoticket', $mensajesSoporte->asuntoticket, ['class' => 'form-control' . ($errors->has('asuntoticket') ? ' is-invalid' : ''), 'placeholder' => 'Asuntoticket']) }}
            {!! $errors->first('asuntoticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>
       <div class="form-group col-sm-6 mb-4">
            {{ Form::label('descripcionticket','Descripcion',['class'=>'mb-4'])  }}
            {{ Form::text('descripcionticket', $mensajesSoporte->descripcionticket, ['class' => 'form-control' . ($errors->has('descripcionticket') ? ' is-invalid' : ''), 'placeholder' => 'Descripcionticket']) }}
            {!! $errors->first('descripcionticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('prioridadticket','Prioridad',['class'=>'mb-4']) }}
            {{ Form::select('prioridadticket',[
            'Media' => 'Media',
            'Alta' => 'Alta',
            'Baja' => 'Baja',

        ],null, ['class' => 'form-control' . ($errors->has('prioridadticket') ? ' is-invalid' : ''), 'placeholder' => 'prioridad']) }}
            {!! $errors->first('prioridadticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (isset($mensajesSoporte->id))

         <div class="form-group col-sm-6 mb-4">

            {{ Form::label('estadoticket','Estado',['class'=>'mb-4'])  }}
            {{ Form::select('estadoticket',[

            'En Proceso' => 'En Proceso',
            'Abierto' => 'Abierto',
            'Cerrado' => 'Cerrado',

         ],null, ['class' => 'form-control' . ($errors->has('estadoticket') ? ' is-invalid' : ''), 'placeholder' => 'Estadoticket']) }}
            {!! $errors->first('estadoticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @endif

       
        {{-- <div class="form-group">
            {{ Form::label('archivoticket') }}
            {{ Form::text('archivoticket', $mensajesSoporte->archivoticket, ['class' => 'form-control' . ($errors->has('archivoticket') ? ' is-invalid' : ''), 'placeholder' => 'Archivoticket']) }}
            {!! $errors->first('archivoticket', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
         <div class="form-group col-sm-6 mb-4">
            {{ Form::label('contacto_id','Contacto',['class'=>'mb-4'])  }}
            {{ Form::select('contacto_id',$contactos, $mensajesSoporte->contacto_id,['class' => 'form-control' . ($errors->has('contacto_id') ? ' is-invalid' : ''), 'placeholder' => 'contacto']) }}
            {!! $errors->first('contacto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

         <div class="form-group col-sm-6 mb-4">
            {{ Form::label('asignado_id','Asignar',['class'=>'mb-4'])  }}
            {{ Form::select('asignado_id',$asignado, $mensajesSoporte->asignado_id,['class' => 'form-control' . ($errors->has('asignado_id') ? ' is-invalid' : ''), 'placeholder' => 'asignar']) }}
            {!! $errors->first('asignado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

           <div class="form-group col-sm-6 mb-4">
            {{ Form::label('product_id','Propiedad',['class'=>'mb-4'])  }}
            {{ Form::select('product_id',$products, $mensajesSoporte->product_id,['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'propiedad']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
      <div class="box-footer mt20 offset-4 mt-4">
      <button class="btn btn-primary btn-lg"  type="submit" class="form-submit">Guardar</button>

    </div>
</div>