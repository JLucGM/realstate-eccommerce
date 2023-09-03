@extends('layouts.app')

@section('template_title')
    {{ $slide->name ?? 'Show Slide' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Slide</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('slides.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $slide->image }}
                        </div>
                        <div class="form-group">
                            <strong>Active:</strong>
                            {{ $slide->active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
