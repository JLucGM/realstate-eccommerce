
<div class="box box-info padding-1">
    <div class="box-body row">

         <div class="form-group col-sm-6 mb-4">

    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'introduce el nombre del Post']) !!}
    @error('name')
    <small class="text-danger">{{$message}}</small>

    @enderror

</div>


         {{-- <div class="form-group col-sm-6 mb-4">

    {!! Form::label('slug', 'URL amigable') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','readonly']) !!}
    @error('slug')
    <small class="text-danger">{{$message}}</small>

    @enderror

</div> --}}


   <div class="form-group col-sm-6 mb-4">

    {!! Form::label('category_id', 'Categorias') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    @error('category_id')
    <small class="text-danger">{{$message}}</small>

    @enderror

</div>


<div class="form-group col-sm-3 mb-3">
    <p class="font-weight-bold"> Estados</p>
    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>

    <label >
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>



    @error('status')
    <br>
    <small class="text-danger">{{$message}}</small>

    @enderror


</div>

</div>

</div>

<div class="form-group">
    <p class="font-weight-bold"> Etiquetas</p>

    @foreach ($tags as $tag)

    <label class="mr-2" >
        {!! Form::checkbox('tags[]', $tag->id, null) !!}
        {{$tag->name}}
    </label>

    @endforeach


    @error('tags')
    <br>
    <small class="text-danger">{{$message}}</small>

    @enderror

</div>




<div class="box box-info padding-1 mt-2">
    <div class="box-body row">
 <div class="form-group col-sm-4 mb-3">
        <div class="image-wrapper">

            @isset ($post->img)

            <img id="picture" src="{{ asset('img/posts/'.$post->img) }}" width="370px"  alt="">


            @else

            <img id="picture" src="https://cdn.pixabay.com/photo/2020/07/08/10/17/car-5383371_960_720.jpg" alt="">
            @endisset

        </div>
    </div>
  <div class="form-group col-sm-3 mb-3">

    
            {!! Form::label('img', 'Imagen que se mostrara en el Post max 1 mg', ) !!}
            {!! Form::file('img', ['class'=>'form-control-file','accept'=>'image/*']) !!}
   

        @error('file')

        <span class="text-danger">{{$message}}</span>

        @enderror

    </div>

</div>
</div>




<div class="form-group">

    {!! Form::hidden('user_id', auth()->user()->id, []) !!}

</div>
<div class="form-group" id="editor2">

    {!! Form::label('extract', 'Pequeña descripcion:') !!}
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}

    @error('extract')
    <small class="text-danger">{{$message}}</small>

    @enderror
</div>


<div
 class="form-group"  >

    {!! Form::label('body', 'Cuerpo del post:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

    @error('body')
    <small class="text-danger">{{$message}}</small>

    @enderror
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

         ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
</script>