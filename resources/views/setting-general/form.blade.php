<div class="box box-info padding-1">
      <div class="box-body row">




             <div class="form-group col-sm-6 mb-4">

            {{ Form::label('moneda','Moneda',['class'=>'mb-4'])  }}
            {{ Form::select('moneda',[

            'COP$' => 'COP$',
            'US$' => 'US$',

         ],null, ['class' => 'form-control' . ($errors->has('moneda') ? ' is-invalid' : ''), 'placeholder' => 'moneda']) }}
            {!! $errors->first('estadoticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>

     <div class="form-group col-sm-6 mt-4" id="c_logo">
    {!! Form::label('logo_empresa', 'Logo:') !!}
    <div class="input-group" >
        <div class="custom-file" >
            {!! Form::file('logo_empresa', ['class' => 'custom-file-input','id'=>'image']) !!}
        </div>
    </div>
</div>


        
  

    </div>
   <div class="box-footer mt20 offset-4">
      <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>

    </div>
</div>