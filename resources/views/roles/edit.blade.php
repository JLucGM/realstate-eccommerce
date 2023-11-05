@php
$html_tag_data = [];
$title = 'Editar rol';
$description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            @includeif('partials.errors')

            <div class="card">
                <div class="card-header">
                    <h2>{{$title}}</h2>
                </div>
                <div class="card-body">
                    {!! Form::model($role,['route'=>['roles.update',$role],'method' => 'put']) !!}
                    @include('roles.form')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection