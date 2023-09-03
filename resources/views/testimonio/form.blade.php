<div class="box box-info padding-1">
    <div class="box-body row">

        
      <div class="form-group col-sm-6 mb-4">
         {{ Form::label('name','Nombre',['class'=>'mb-4']) }}
            {{ Form::text('name', $testimonio->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
     
            <div class="form-group col-sm-6 mb-4">
               {{ Form::label('testitomio','Testimonio',['class'=>'mb-4']) }}
            {{ Form::text('testimonio', $testimonio->testimonio, ['class' => 'form-control' . ($errors->has('testimonio') ? ' is-invalid' : ''), 'placeholder' => 'Testimonio']) }}
            {!! $errors->first('testimonio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

   <div class="form-group col-sm-6 mt-4" id="c_logo">
    {!! Form::label('image', 'Imagen:') !!}
    <div class="input-group" >
        <div class="custom-file" >
            {!! Form::file('image', ['class' => 'custom-file-input','id'=>'image']) !!}
        </div>
    </div>
</div>

    </div>
   <div class="box-footer mt20 offset-4">
      <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>

    </div>
</div>