@extends('layouts.app')

@section('template_title')
    Create Ticket Chat
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Ticket Chat</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ticket-chats.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('ticket-chat.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
