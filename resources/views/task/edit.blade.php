@php
    $html_tag_data = [];
    $title = 'Editar Tarea';
    $description= 'Editar Tarea'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/products.list.js"></script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Tarea</span>
                    </div>
                    <div class="card-body">
                              {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'patch']) !!}

                            {{ method_field('PATCH') }}
                            @csrf

                            @include('task.form')

                        </form>



       
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
