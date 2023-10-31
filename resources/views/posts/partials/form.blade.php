<div class="p-1">
    <div class="row">

        <div class="form-group col-12 mb-3">
            {!! Form::label('img', 'Portada', ['class'=>'form-label'] ) !!}
            {!! Form::file('img', ['class'=>'form-control','accept'=>'image/*']) !!}
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                    Imagen que se mostrara en el Post max 1 mg
                </span>
            </div>
            @error('file')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group col-12 mb-3">
            {!! Form::label('name', 'Nombre', ['class'=>'form-label']) !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'introduce el nombre del Post']) !!}
            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-12 col-md-6 mb-3">
            {!! Form::label('category_id', 'Categorias', ['class'=>'form-label']) !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            @error('category_id')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-12 col-md-6 mb-3">
            {!! Form::label('tag', 'Etiquetas:', ['class'=>'form-label']) !!}
            @foreach ($tags as $tag)
            <label class="mr-2">
                {!! Form::checkbox('tags[]', $tag->id, null) !!}
                {{$tag->name}}
            </label>
            @endforeach

            @error('tags')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        {!! Form::hidden('user_id', auth()->user()->id, []) !!}

        <div class="form-group col-12 mb-3">
            {!! Form::label('extract', 'Pequeña descripcion:', ['class'=>'form-label']) !!}
            {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
            @error('extract')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-12 mb-3">
            {!! Form::label('body', 'Cuerpo del post:', ['class'=>'form-label']) !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            @error('body')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-12 col-md-6 mb-3">
            {!! Form::label('status', 'Status:', ['class'=>'form-label']) !!}
            <label class="mr-2">
                {!! Form::radio('status', 1, true) !!}
                Borrador
            </label>

            <label>
                {!! Form::radio('status', 2) !!}
                Publicado
            </label>
            @error('status')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#extract'))
        .catch(error => {
            console.error(error);
        });
</script>