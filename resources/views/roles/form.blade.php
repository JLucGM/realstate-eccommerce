<div class="form-group col-12 col-sm-6">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre de la etiqueta']) !!}
    </div>
</div>

<div class="form-group col-12 col-sm-6" style="height: 400px; overflow:auto;">

    @foreach($permissions as $permission)
    <div class="mb-2">
        {!! Form::checkbox('permissions[]',$permission->id,null,['class'=>'mr-1']) !!}
        <label class="form-label" for="">{{$permission->description.' | '.$permission->name}}</label>
    </div>
    @endforeach
</div>

<div class="card-footer">
    <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>
</div>