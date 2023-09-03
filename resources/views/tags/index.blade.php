

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>etiquetas</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success float-right"
                       href="{{ route('tags.create') }}">
                        Agregar
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">



        <div class="clearfix"></div>

        <div class="card">

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)

                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>


                            <td width="10px"> <a class="btn btn-success btn-sm" href="{{route('tags.edit',$tag)}}">Editar</a></td>


                            <td width="10px"> <form action="{{route('tags.destroy',$tag)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form></td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection


