@php
$html_tag_data = [];
$title = 'Lista de Testimonio';
$description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/products.list.js"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                    <span id="card_title">
                        <h1>
                            {{$title}}
                        </h1>
                    </span>

                    <div class="float-end">
                        <a href="{{ route('testimonios.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                            {{ 'Agregar Nuevo' }}
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
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Testimonio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonios as $testimonio)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="/image/testimonio/{{$testimonio->image}}" class="" style=" width: 70px; height:50px"></td>
                                    <td>{{ $testimonio->name }}</td>
                                    <td>{{ $testimonio->testimonio }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('testimonios.destroy',$testimonio->id) }}" method="POST">
                                            <a class="btn btn-sm btn-success" href="{{ route('testimonios.edit',$testimonio->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
            {!! $testimonios->links() !!}
        </div>
    </div>
</div>
@endsection