


@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Crear Etiqueta</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route'=>'tags.store']) !!}


                    @include('blog..tags.partials.form')


                {!! Form::submit('guardar',['class'=>'btn btn-primary']) !!}


                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection







@push('page_scripts')

<script src="{{asset('plugins/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}">


</script>

<script>
    $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
</script>


@endpush
