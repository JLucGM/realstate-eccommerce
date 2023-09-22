@php
    $html_tag_data = [];
    $title = 'Lista de productos';
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
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                          <h2>Lista de Paises</h2>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('paises.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ "Agregar Nuevo"}}
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
                                        
										<th>Nombre</th>
										
										<th ><p class="float-end mb-0">Acciones</p></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paises as $pais)
                                        <tr>
                                            
											<td>{{ $pais->name }}</td>
                                            
											

                                            <td class="text-end">
                                                <form action="{{ route('paises.destroy',$pais->id) }}" method="POST">
                                                    {{--<a class="btn btn-sm btn-primary " href="{{ route('paises.show',$pais->id) }}"><i data-acorn-icon="eye" class="icon" data-acorn-size="10"></i></a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('paises.edit',$pais->id) }}"><i data-acorn-icon="edit" class="icon" data-acorn-size="10"></i></a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{--!! $paises->links() !!--}}
            </div>
        </div>
    </div>
@endsection
