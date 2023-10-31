<div class="p-1">
    <div class="row">

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('name','Nombre',['class'=>'form-label']) }}
            {{ Form::text('name', $testimonio->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('testitomio','Testimonio',['class'=>'form-label']) }}
            {{ Form::text('testimonio', $testimonio->testimonio, ['class' => 'form-control' . ($errors->has('testimonio') ? ' is-invalid' : ''), 'placeholder' => 'Testimonio']) }}
            {!! $errors->first('testimonio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6 mb-4">
            <label for="formFile" class="form-label">Imagen de la persona</label>
            <input class="form-control" name="image" type="file" id="formFile">
        </div>

    </div>
    <div class="card-footer">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
    </div>
</div>