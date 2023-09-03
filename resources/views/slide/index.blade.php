@php
    $html_tag_data = [];
    $title = 'Lista de slides';
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
                                 {{ __('Slides') }}
                                </h1> 
                            </span>

                             <div class="float-right">
                                <a href="{{ route('slides.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ "Agregar Nuevo" }}
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
                                        <th>No</th>
                                        
										<th>Image</th>
										<th>Titulo</th>

										<th>Texto</th>

										<th>Estatus</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slides as $slide)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										  <td><img src="/image/{{$slide->image}}"  class="" style=" width: 70px; height:50px"></td>

											<td>{{ $slide->title }}</td>

											<td>{{ $slide->texto }}</td>

											<td>{{ $slide->active }}</td>

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
                {!! $slides->links() !!}
            </div>
        </div>
    </div>
@endsection
