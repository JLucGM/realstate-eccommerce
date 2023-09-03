<div class="box box-info padding-1">
    <div class="box-body row">


         <div class="form-group col-sm-6 mb-4">
            {{ Form::label('title','Titulo Principal',['class'=>'mb-4']) }}
            {{ Form::text('title', $slide->texto, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         <div class="form-group col-sm-6 mb-4">
            {{ Form::label('texto','Texto Principal',['class'=>'mb-4']) }}
            {{ Form::text('texto', $slide->texto, ['class' => 'form-control' . ($errors->has('texto') ? ' is-invalid' : ''), 'placeholder' => 'texto']) }}
            {!! $errors->first('texto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    
     <div class="form-group col-sm-6 mt-4" id="c_logo">
    {!! Form::label('image', 'Imagen:') !!}
    <div class="input-group" >
        <div class="custom-file" >
            {!! Form::file('image', ['class' => 'custom-file-input','id'=>'image']) !!}
        </div>
    </div>
</div>

<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('active', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('active', 'Estatus', ['class' => 'form-check-label']) !!}
    </div>
</div>


    </div>
   <div class="box-footer mt20 offset-4">
      <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>

    </div>
</div>