<div class="box box-info padding-1">
    <div class="box-body row">

      
        
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('tipoRelacion','Tipo de Relacion',['class'=>'mb-4']) }}
            {{ Form::select('tipoRelacion',[
                  'interesado' => 'Interesado',
            'colega' => 'Colega',
            'constructora' => 'Constructora',
            'inversionista' => 'Inversionista',
            'consulta' => 'consulta',
            'propietario' => 'Propietario',
            'inquilinos' => 'Inquilinos',
            'personales' => 'Personales',
            'deshabilitados' => 'Deshabilitado',


        ],null, ['class' => 'form-control' . ($errors->has('tipoRelacion') ? ' is-invalid' : ''), 'placeholder' => 'Tiporelacion']) }}
            {!! $errors->first('tipoRelacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>



       <div class="form-group col-sm-6 mb-4">
         {{ Form::label('observaciones','Observaciones',['class'=>'mb-4']) }}
            {{ Form::textarea('observaciones', $contactosPropiedad->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones','rows'=>'2']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
      <div class="form-group col-sm-6 mb-4">
             {{ Form::label('product_id','Propiedad',['class'=>'mb-4']) }}
            {{ Form::select('product_id', $product,null, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Propiedad']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>




        <input type="hidden" name="contacto_id" id="" value="{{ $id }}">

    </div>
       <div class="box-footer mt20 offset-4 mt-4">
      <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>

    </div>
</div>