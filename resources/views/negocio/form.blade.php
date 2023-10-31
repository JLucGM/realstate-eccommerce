<div class="p-1">
    <div class=" row">

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('name','Nombre del negocio') }}
            {{ Form::text('name', $negocio->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('status','Estatus')  }}
            {{ Form::select('status',[
            'Nuevos' => 'Nuevos',
            'Contactado' => 'Contactado',
            'Presentacion Inmueble' => 'Presentacion Inmueble',
            'Pre-seleccion' => 'Pre-seleccion',
            'Negociacion' => 'Negociacion',
            'Cierre' => 'Cierre',
         ],$negocio->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Estatus']) }}
            {!! $errors->first('estatus', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('presupuestoTotal','Presupuesto') }}
            {{ Form::text('presupuestoTotal', $negocio->presupuestoTotal, ['class' => 'form-control' . ($errors->has('presupuestoTotal') ? ' is-invalid' : ''), 'placeholder' => 'Presupuestototal']) }}
            {!! $errors->first('presupuestoTotal', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('contacto_id','Contacto') }}
            {{ Form::select('contacto_id',$contactos, $negocio->contacto_id, ['class' => 'form-control' . ($errors->has('contacto_id') ? ' is-invalid' : ''), 'placeholder' => 'Contacto']) }}

            {{--<select class="form-control" name="contacto_id" id="contacto_id">
                @foreach ($contactos as $contacto)
                <option value="{{ $contacto->id }}">{{$contacto->name}}</option>
            @endforeach
            </select>--}}
            {!! $errors->first('contacto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('propiedad_id','Propiedad') }}
            {{ Form::select('propiedad_id',$propiedades, $negocio->propiedad_id, ['class' => 'form-control' . ($errors->has('propiedad_id') ? ' is-invalid' : ''), 'placeholder' => 'Propiedad']) }}
            {!! $errors->first('propiedad_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('agente_id', 'Agente') }}
            {{ Form::select('agente_id', $agente, $negocio->agente_id, ['class' => 'form-control' . ($errors->has('agente_id') ? ' is-invalid' : ''), 'placeholder' => 'Agente']) }}
            {!! $errors->first('agente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="card-footer mt-2">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
    </div>
</div>