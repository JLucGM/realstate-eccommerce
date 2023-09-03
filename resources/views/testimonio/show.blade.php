@extends('layouts.app')

@section('template_title')
    {{ $testimonio->name ?? 'Show Testimonio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Testimonio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('testimonios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $testimonio->name }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $testimonio->image }}
                        </div>
                        <div class="form-group">
                            <strong>Testimonio:</strong>
                            {{ $testimonio->testimonio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
