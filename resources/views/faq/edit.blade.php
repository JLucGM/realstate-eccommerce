@php
$html_tag_data = [];
$title = 'Editar FAQS';
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
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Faq</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('faqs.update', $faq->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('faq.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
