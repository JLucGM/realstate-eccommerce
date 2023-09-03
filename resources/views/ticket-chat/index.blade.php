@extends('layouts.app')

@section('template_title')
    Ticket Chat
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                               <h1>
                                {{"Lista de ticket chat"}}
                                </h1> 
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ticket-chats.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Mensaje</th>
										<th>Sender Id</th>
										<th>Receiver Id</th>
										<th>Mensajes Soporte Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ticketChats as $ticketChat)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ticketChat->mensaje }}</td>
											<td>{{ $ticketChat->sender_id }}</td>
											<td>{{ $ticketChat->receiver_id }}</td>
											<td>{{ $ticketChat->mensajes_soporte_id }}</td>

                                            <td class="text-end">
                                                <form action="{{ route('ticket-chats.destroy',$ticketChat->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ticket-chats.show',$ticketChat->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ticket-chats.edit',$ticketChat->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ticketChats->links() !!}
            </div>
        </div>
    </div>
@endsection
