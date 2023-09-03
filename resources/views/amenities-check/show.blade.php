@extends('layouts.app')

@section('template_title')
    {{ $amenitiesCheck->name ?? 'Show Amenities Check' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Amenities Check</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('amenities-checks.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $amenitiesCheck->name }}
                        </div>
                        <div class="form-group">
                            <strong>Amenities Id:</strong>
                            {{ $amenitiesCheck->amenities_id }}
                        </div>
                        <div class="form-group">
                            <strong>Icon:</strong>
                            {{ $amenitiesCheck->icon }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
