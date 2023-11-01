@extends('layouts.app')

@section('template_title')
    {{ $page->name ?? 'Show Page' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Page</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pages.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $page->name }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $page->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $page->body }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $page->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
