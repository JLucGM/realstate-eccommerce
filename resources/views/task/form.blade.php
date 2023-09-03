<div class="box box-info padding-1">
    <div class="box-body row">
        
          <div class="form-group col-sm-6 mb-4">

         {{ Form::label('name','Título',['class'=>'mb-4']) }}
            {{ Form::text('name', $task->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'titulo de tarea']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
     

 <div class="form-group col-sm-6 mb-4">
            {{ Form::label('tipoTarea','Tipo de Tarea',['class'=>'mb-4']) }}
            {{ Form::select('tipoTarea',[
            'Contacto' => 'Contacto',
            'Visita' => 'Visita',
            'Cobranza' => 'Cobranza',


        ],null, ['class' => 'form-control' . ($errors->has('tipoRelacion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo tarea']) }}
            {!! $errors->first('tipoRelacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

     <div class="form-group col-sm-3 mb-4">
         {{ Form::label('horaInicio','Hora de Inicio',['class'=>'mb-4']) }}
            {{ Form::datetimeLocal('horaInicio', $task->horaInicio, ['class' => 'form-control' . ($errors->has('horaInicio') ? ' is-invalid' : ''), 'placeholder' => 'Horainicio']) }}
            {!! $errors->first('horaInicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    <div class="form-group col-sm-3 mb-4">
        {{ Form::label('horaFin','Hora de Culminación',['class'=>'mb-4']) }}
            {{ Form::datetimeLocal('horaFin', $task->horaFin, ['class' => 'form-control' . ($errors->has('horaFin') ? ' is-invalid' : ''), 'placeholder' => 'Horafin']) }}
            {!! $errors->first('horaFin', '<div class="invalid-feedback">:message</div>') !!}
        </div>

      <div class="form-group col-sm-6 mb-4">

                {{ Form::label('description','Descripción',['class'=>'mb-4']) }}
            {{ Form::textarea('description', $task->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripción','rows'=>'3']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>


      <div class="form-group col-sm-6 mb-4">
        {{ Form::label('contacto_id','Asociar Contacto',['class'=>'mb-4']) }}
            {{ Form::select('contacto_id', $contactos, null,['class' => 'form-control' . ($errors->has('contacto_id') ? ' is-invalid' : ''), 'placeholder' => 'seleccione']) }}
            {!! $errors->first('contacto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

         <div class="form-group col-sm-6 mb-4">
         {{ Form::label('product_id','Asociar Propiedad',['class'=>'mb-4']) }}
            {{ Form::select('product_id', $products,null, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'seleccione']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (isset($task->id))
          <div class="form-group col-sm-6 mb-4">
            {{ Form::label('status','Estatus',['class'=>'mb-4']) }}
            {{ Form::select('status',[
            'Pendiente' => 'Pendiente',
            'En proceso' => 'En proceso',
            'Completado' => 'Completado',


        ],null, ['class' => 'form-control' . ($errors->has('tipoRelacion') ? ' is-invalid' : ''), 'placeholder' => 'status']) }}
            {!! $errors->first('tipoRelacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            
        @endif

       

    </div>
         <div class="box-footer mt20 offset-4 mt-4">
      <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>

    </div>
</div>