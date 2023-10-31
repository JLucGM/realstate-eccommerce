@php
$html_tag_data = [];
$title = 'Lista de slides';
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
        new DataTable('#tabla-slide');
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>{{ $title }}</h1>

                    <a href="{{ route('slides.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                        {{ "Crear" }}
                    </a>

                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla-slide">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Imagen</th>
                                    <th>Titulo</th>
                                    <th>Texto</th>
                                    <th>Status</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $slide)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="/image/sliders/{{$slide->image}}" class="" style=" width: 70px; height:50px"></td>
                                    <td>{{ $slide->title }}</td>
                                    <td>{{ $slide->texto }}</td>

                                    <td>
                                        @if($slide->active == 1)
                                        <span class="badge bg-success">Publicado</span>
                                        @else($slide->active == 0)
                                        <span class="badge bg-danger">Inactivo</span>
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <form action="{{ route('slides.destroy',$slide->id) }}" method="POST">
                                            {{-- <a class="btn btn-sm btn-primary " href="{{ route('slides.show',$slide->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                            <a class="btn btn-sm btn-success" href="{{ route('slides.edit',$slide->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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