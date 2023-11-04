@php
$html_tag_data = [];
$title = 'Lista de Información de sección de servicios';
$description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
{{--<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/products.list.js"></script>--}}
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <span id="card_title">
                        <h2>{{$title}}</h2>
                    </span>
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
                                    <th>Titulo de sección</th>
                                    <th>Informacion de la sección</th>
                                    <th>Primera sección</th>
                                    <th>Segunda sección</th>
                                    <th>Tercera sección</th>
                                    <th>Cuarta sección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($infoWebs as $infoWeb)
                                <tr>
                                    <td>{{ $infoWeb->title_info }}</td>
                                    <td>{{ $infoWeb->select_us }}</td>
                                    <td>{{ $infoWeb->sell_home }}</td>
                                    <td>{{ $infoWeb->rent_home }}</td>
                                    <td>{{ $infoWeb->buy_home }}</td>
                                    <td>{{ $infoWeb->marketing_free }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('info-webs.destroy',$infoWeb->id) }}" method="POST">
                                            {{-- <a class="btn btn-sm btn-primary " href="{{ route('info-webs.show',$infoWeb->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                            @can('admin.info-webs.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('info-webs.edit',$infoWeb->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @can('admin.info-webs.delete')
                                            @method('DELETE')
                                            {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button> --}}
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
            {!! $infoWebs->links() !!}
        </div>
    </div>
</div>
@endsection