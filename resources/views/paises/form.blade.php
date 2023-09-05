<div class="box box-info padding-1">
    <div class="box-body row">


        
         <div class="form-group col-sm-6 mb-4">
            {{ Form::label('Nombre','Nombre',['class'=>'mb-4']) }}
            {{ Form::text('name', $pais->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <input type="hidden" name="id" value="{{ $pais->id }}">


        

    </div>
    <div class="box-footer mt20 offset-4">
      <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>

    </div>
</div>