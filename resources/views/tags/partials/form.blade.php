<div class="p-1">
    <div class="row">


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
            {!! Form::text('slug', null, ['class'=>'form-control','readonsly']) !!}
            @error('slug')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>

        <div class="form-group col-12">
            {!! Form::label('color', 'Color') !!}
            {!! Form::select('color',$colors, null, ['class'=> 'form-control']) !!}

            @error('color')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
</div>