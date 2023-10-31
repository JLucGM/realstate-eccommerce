<div class="p-1">
  <div class=" row">

    <div class="form-group col-sm-6 mb-4">
      {{ Form::label('Nombre','Nombre',['class'=>'form-label']) }}
      {{ Form::text('name', $pais->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
      {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>

  </div>
  <div class="card-footer mt-2">
    <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
  </div>
</div>