<div class="p-1">
    <div class=" row">
    @dump($errors->all())

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('title','Titulo Principal',['class'=>'mb-1']) }}
            {{ Form::text('title', $slide->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('texto','Texto Principal',['class'=>'mb-1']) }}
            {{ Form::text('texto', $slide->texto, ['class' => 'form-control' . ($errors->has('texto') ? ' is-invalid' : ''), 'placeholder' => 'texto']) }}
            {!! $errors->first('texto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-md-6 mt-4" id="c_logo">
            {!! Form::label('image', 'Imagen:') !!}
            <div class="input-group">
                <div class="custom-file">
                    {!! Form::file('image', ['class' => 'form-control'. ($errors->has('image') ? ' is-invalid' : ''),'accept'=>'image/*','id'=>'image'],) !!}
                </div>
            </div>
            <p>Resolución recomendada: 1280x620px</p>
        </div>

        <div class="form-group col-12 col-md-6 mt-4">
            <div class="form-check form-switch">
                {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
                {!! Form::checkbox('active', '1', $slide->active, ['class' => 'form-check-input', 'id' => 'switch']) !!}
                <label class="form-check-label" for="switch">Activar</label>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
    </div>
</div>