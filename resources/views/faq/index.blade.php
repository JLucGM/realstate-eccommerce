@php
$html_tag_data = [];
$title = 'FAQS';
$description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>{{ $title }}</h2>
                    <div class="">
                        <a href="{{ route('faqs.create') }}" class="btn btn-primary btn-sm ">
                            Agregar Nuevo
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

                                    <th>Preguntas</th>
                                    <th>Respuestas</th>
                                    <th>Status</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->answer }}</td>
                                    <td>{{ $faq->status }}</td>

                                    <td>
                                        <form action="{{ route('faqs.destroy',$faq->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('faqs.show',$faq->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            <a class="btn btn-sm btn-success" href="{{ route('faqs.edit',$faq->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
            {!! $faqs->links() !!}
        </div>
    </div>
</div>
@endsection