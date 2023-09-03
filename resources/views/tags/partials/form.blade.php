<div class="box box-info padding-1">
    <div class="box-body row">

<div class="form-group col-sm-6 mb-4">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre de la etiqueta']) !!}


    @error('name')
    <small class="text-danger">
        {{$message}}
    </small>

    @enderror
</div>

<div class="form-group col-sm-6 mb-4">
    {!! Form::label('slug', 'URL amigable') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','readonly']) !!}
    @error('slug')
    <small class="text-danger">
        {{$message}}
    </small>

    @enderror
</div>
</div>
</div>


<div class="form-group">
    {!! Form::label('color', 'Color') !!}
    {!! Form::select('color',$colors, null, ['class'=> 'form-control']) !!}

    @error('color')
    <small class="text-danger">
        {{$message}}
    </small>

    @enderror
</div>
