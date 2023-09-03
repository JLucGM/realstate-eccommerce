@extends('layouts.app')

@section('template_title')
    {{ $infoWeb->name ?? 'Show Info Web' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Info Web</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('info-webs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Select Us:</strong>
                            {{ $infoWeb->select_us }}
                        </div>
                        <div class="form-group">
                            <strong>Sell Home:</strong>
                            {{ $infoWeb->sell_home }}
                        </div>
                        <div class="form-group">
                            <strong>Rent Home:</strong>
                            {{ $infoWeb->rent_home }}
                        </div>
                        <div class="form-group">
                            <strong>Buy Home:</strong>
                            {{ $infoWeb->buy_home }}
                        </div>
                        <div class="form-group">
                            <strong>Marketing Free:</strong>
                            {{ $infoWeb->marketing_free }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
