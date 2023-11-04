@php
$html_tag_data = [];
$title = 'Categorias';
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
                <div class="card-header d-flex justify-content-between">

                    <h2>{{"Categorias"}}</h2>

                    @can('admin.categorias.create')
                    <a href="{{route('cat.create')}}" class="btn btn-primary btn-sm float-right" data-placement="left">
                        {{"Crear" }}
                    </a>
                    @endcan
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
                                <th>Nombre</th>
                                <th>Estatus</th>

                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $ctgry)

                            <tr>
                                <td>{{ $ctgry->name }}</td>
                                @if ($ctgry->status == 0)
                                <td><span class="badge bg-danger px-3">Inactivo</span></td>
                                @else
                                <td><span class="badge bg-success px-3">Activo</span></td>
                                @endif

                                <td class="text-end">
                                    <form action="{{ route('cat.delete',$ctgry->id) }}" method="GET">
                                        @csrf
                                        @can('admin.categorias.edit')
                                        <a class="btn btn-sm btn-success" href="{{ route('cat.edit',$ctgry->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                        @endcan
                                        @can('admin.categorias.delete')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection