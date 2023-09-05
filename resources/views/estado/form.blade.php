<div class=" p-3">
    <div class="row">

        <div class="col-12 col-md-6">
            <div class="form-group">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', $estado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="col-12 col-md-6">
        {{ Form::label('País perteneciente') }}
            <select class="form-control" name="pais_id" id="rol">
                @foreach ($paises as $pais)
                <option value="{{$pais->id}}">{{$pais->name}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>