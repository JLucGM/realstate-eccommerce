


@php
    $html_tag_data = [];
    $title = 'Crear slides';
    $description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')


@endsection

@section('js_page')

@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>crear post</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                {!! Form::model($post,['route'=>['posts.update',$post],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}


                    @include('posts.partials.form')






                          <div class="box-footer mt20 offset-4 mt-3">
      <button class="btn_style" type="submit" class="form-submit">Guardar</button>

    </div>

            </div>
        </div>
    </div>
@endsection

@push('page_scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script src="{{asset('plugins/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>



<script>

    $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });


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


        //cambiar imagen

        document.getElementById("img").addEventListener('change',CambiarImagen);

        function CambiarImagen(event) {
            var file= event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event)=>{
                document.getElementById('picture').setAttribute('src',event.target.result);
            };

            reader.readAsDataURL(file);

        }


</script>
<style>
    .image-wrapper{
        position: relative;
        padding-bottom: 56.25%;

    }

    .image-wrapper img{
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>

@endpush



