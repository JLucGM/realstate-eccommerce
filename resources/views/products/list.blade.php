@php
    $html_tag_data = [];
    $title = 'Lista de Propiedades';
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
                               <h1>
                                {{"Lista de Propiedades"}}
                                </h1> 
                            </span>

                             <div class="float-right">
                                <a href="{{route('new.product')}}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{"Agregar Nuevo" }}
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
                                     
                                        
										<!-- <th>Foto</th> -->
										<th>Nombre de la propiedad</th>
										<th>Precio</th>
										<th>Estatus</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                   
                                        <tr>
                                            {{--@if (isset($product->media[0]))
                                            <td> <img src="{{ $product->media[0]->getUrl('thumb')}}" alt="imagen no encontrada" class="" style=" width: 70px; height:50px"></td>
                                                @else
                                            <td> <img src="" alt="imagen no encontrada" class="" style=" width: 70px; height:50px"></td>
                                            @endif--}}
                   
										  {{-- <td><img src="/image/{{$slide->image}}"  class="" style=" width: 70px; height:50px"></td> --}}

											<td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->status }}</td>

											{{-- <td>{{ isset($mensajesSoporte->product->name) ? $mensajesSoporte->product->name: 'No definido' }}</td> --}}



                                            <td class="text-end">
                                                <form action="{{ route('propiedad.delete', $product->id) }}" method="GET">
                                                    <a class="btn btn-sm btn-success" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                  
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
