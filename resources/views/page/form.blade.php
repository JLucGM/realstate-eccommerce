<div class="p-1">
    <div class="row">

        <div class="form-group mb-4">
            {{ Form::label('name','Nombre',['class' => 'form-label']) }}
            {{ Form::text('name', $page->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-4">
            {{ Form::label('body','Texto',['class' => 'form-label']) }}
            {{ Form::textarea('body', $page->body, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Body']) }}
            {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-4">
            <div class="form-check form-switch">

                {{ Form::label('Activo') }}
                {!! Form::hidden('status', 1, ['class' => 'form-check-input']) !!}
                {!! Form::checkbox('status', '0', $page->status, ['class' => 'form-check-input', 'id' => 'switch']) !!}
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

    </div>
    <div class="card-footer mt-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });

</script>
