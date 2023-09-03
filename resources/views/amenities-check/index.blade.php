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
                               <h2>
                                {{"Comodidades"}}
                                </h2> 
                            </span>

                             <div class="float-right">
                                <a href="{{ route('amenities-checks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar Nuevo') }}
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
                                        
										<th>Nombre</th>
										<th>Caracteristica</th>
										<th>Icon</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amenitiesChecks as $amenitiesCheck)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $amenitiesCheck->name }}</td>
											<td>{{ $amenitiesCheck->amenities->name }}</td>
											<td>{{ $amenitiesCheck->icon }}</td>

                                            <td class="text-end">
                                                <form action="{{ route('amenities-checks.destroy',$amenitiesCheck->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('amenities-checks.edit',$amenitiesCheck->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $amenitiesChecks->links() !!}
            </div>
        </div>
    </div>
@endsection
