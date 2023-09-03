@extends('layouts.app')

@section('template_title')
    {{ $settingGeneral->name ?? 'Show Setting General' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Setting General</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('setting-generals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Moneda:</strong>
                            {{ $settingGeneral->moneda }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
