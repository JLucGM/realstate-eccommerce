@php
$html_tag_data = [];
$title = 'Mostrar FAQS';
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Faq</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('faqs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Question:</strong>
                            {{ $faq->question }}
                        </div>
                        <div class="form-group">
                            <strong>Answer:</strong>
                            {{ $faq->Answer }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $faq->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
