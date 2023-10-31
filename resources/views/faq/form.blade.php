<div class="p-3">
    <div class="row">
        <div class="col-12">
            <div class="form-group mb-4">
                {{ Form::label('question') }}
                {{ Form::text('question', $faq->question, ['class' => 'form-control' . ($errors->has('question') ? ' is-invalid' : ''), 'placeholder' => 'Question']) }}
                {!! $errors->first('question', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="col-12">
            <div class="form-group mb-4">
                {{ Form::label('Answer') }}
                {{ Form::textarea('answer', $faq->answer, ['class' => 'form-control' . ($errors->has('answer') ? ' is-invalid' : ''), 'placeholder' => 'Answer']) }}
                {!! $errors->first('answer', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="col-12">
            <div class="form-group mb-4">
                {{ Form::label('status') }}
                <select class="form-control" name="status">
                    <option value="{{$faq->status}}">{{$faq->status}}</option>
                    <option value="Publicar">Publicar</option>
                    <option value="Borrador">Borrador</option>
                    <option value="Pendiente">Pendiente</option>
                </select>
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="card-footer mt-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>