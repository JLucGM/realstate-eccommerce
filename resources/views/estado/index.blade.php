@php
$html_tag_data = [];
$title = 'Lista de estado';
$description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">

                    <h2>{{ $title }}</h2>

                    <div class="">
                        <a href="{{ route('estados.create') }}" class="btn btn-primary btn-sm">
                            Crear nuevo
                        </a>
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
                                    <th>Nombre</th>
                                    <th>Pais perteneciente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estados as $estado)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $estado->name }}</td>
                                    <td>{{ $estado->paise->name }}</td>

                                    <td>
                                        <form action="{{ route('estados.destroy',$estado->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('estados.show',$estado->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            <a class="btn btn-sm btn-success" href="{{ route('estados.edit',$estado->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
            {!! $estados->links() !!}
        </div>
    </div>
</div>
@endsection