<div class="p-1">
    <div class="row">

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('name','Título de la tarea',['class'=>'form-label']) }}
            {{ Form::text('name', $task->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Título de tarea']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('tipoTarea','Tipo de Tarea',['class'=>'form-label']) }}
            {{ Form::select('tipoTarea',[
            'Contacto' => 'Contacto',
            'Visita' => 'Visita',
            'Cobranza' => 'Cobranza',
        ],null, ['class' => 'form-control' . ($errors->has('tipoRelacion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de tarea']) }}
            {!! $errors->first('tipoRelacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-md-3 mb-4">
            {{ Form::label('horaInicio','Fecha de inicio',['class'=>'form-label']) }}
            {{ Form::datetimeLocal('horaInicio', $task->horaInicio, ['class' => 'form-control' . ($errors->has('horaInicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de inicio']) }}
            {!! $errors->first('horaInicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-md-3 mb-4">
            {{ Form::label('horaFin','Fecha de culminación',['class'=>'form-label']) }}
            {{ Form::datetimeLocal('horaFin', $task->horaFin, ['class' => 'form-control' . ($errors->has('horaFin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de fin']) }}
            {!! $errors->first('horaFin', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('contacto_id','Asociar con contacto',['class'=>'form-label']) }}
            {{ Form::select('contacto_id', $contactos, null,['class' => 'form-control' . ($errors->has('contacto_id') ? ' is-invalid' : ''), 'placeholder' => 'seleccione']) }}
            {!! $errors->first('contacto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('product_id','Asociar con propiedad',['class'=>'form-label']) }}
            {{ Form::select('product_id', $products,null, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'seleccione']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @if (isset($task->id))
        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('status','status',['class'=>'form-label']) }}
            {{ Form::select('status',[
            'Pendiente' => 'Pendiente',
            'En proceso' => 'En proceso',
            'Completado' => 'Completado',
        ],null, ['class' => 'form-control' . ($errors->has('tipoRelacion') ? ' is-invalid' : ''), 'placeholder' => 'status']) }}
            {!! $errors->first('tipoRelacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @endif

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('description','Descripción',['class'=>'form-label']) }}
            {{ Form::textarea('description', $task->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripción','rows'=>'3']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="card-footer mt-2">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>

    </div>
</div>