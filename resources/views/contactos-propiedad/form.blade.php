<div class="box box-info padding-1">
    <div class="box-body row">
        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('tipoRelacion','Tipo de Relacion',['class'=>'mb-4']) }}
            {{ Form::select('tipoRelacion',[
            'interesado' => 'Interesado',
            'Colega' => 'Colega',
            'Constructora' => 'Constructora',
            'Inversionista' => 'Inversionista',
            'Consulta' => 'consulta',
            'Propietario' => 'Propietario',
            'Inquilinos' => 'Inquilinos',
            'Personales' => 'Personales',
            'Deshabilitados' => 'Deshabilitado',
        ],null, ['class' => 'form-control' . ($errors->has('tipoRelacion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de relacion']) }}
            {!! $errors->first('tipoRelacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('observaciones','Observaciones',['class'=>'mb-4']) }}
            {{ Form::textarea('observaciones', $contactosPropiedad->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones','rows'=>'2']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('product_id','Propiedad de interes',['class'=>'mb-4']) }}
            {{ Form::select('product_id', $product,null, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Propiedad']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <input type="hidden" name="contacto_id" id="" value="{{ $id }}">

    </div>
    <div class="">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
    </div>
</div>