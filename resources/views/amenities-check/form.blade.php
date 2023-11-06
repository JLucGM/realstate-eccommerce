<div class="p-1">

    <div class="form-group mb-2">
        {{ Form::label('Nombre') }}
        {{ Form::text('name', $amenitiesCheck->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group mb-2">
        {{ Form::label('Categoria de comodidades') }}
        {{ Form::select('amenities_id', $amenities->pluck('name', 'id'), $amenitiesCheck->amenities_id, ['class' => 'form-control' . ($errors->has('amenities_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione categoría']) }}
        {!! $errors->first('amenities_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="card-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>