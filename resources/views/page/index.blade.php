@php
$html_tag_data = [];
$title = 'Lista de páginas';
$description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#tabla-pages');
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>{{$title}}</h2>
                    <a href="{{ route('pages.create') }}" class="btn btn-primary btn-sm">
                        {{ __('Crear') }}
                    </a>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla-pages">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $page->name }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>
                                        @if($page->status == 0 )
                                        <span class="badge bg-success">Publicado</span>
                                        @endif
                                        @if($page->status == 1 )
                                        <span class="badge bg-danger">Borrador</span>

                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('pages.destroy',$page->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('pages.show',$page->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            <a class="btn btn-sm btn-success" href="{{ route('pages.edit',$page->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
        </div>
    </div>
</div>
@endsection