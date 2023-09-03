@extends('layouts.app')

@section('template_title')
    {{ $ticketChat->name ?? 'Show Ticket Chat' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ticket Chat</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ticket-chats.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Mensaje:</strong>
                            {{ $ticketChat->mensaje }}
                        </div>
                        <div class="form-group">
                            <strong>Sender Id:</strong>
                            {{ $ticketChat->sender_id }}
                        </div>
                        <div class="form-group">
                            <strong>Receiver Id:</strong>
                            {{ $ticketChat->receiver_id }}
                        </div>
                        <div class="form-group">
                            <strong>Mensajes Soporte Id:</strong>
                            {{ $ticketChat->mensajes_soporte_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
