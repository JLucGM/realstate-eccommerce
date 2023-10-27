@php
$html_tag_data = [];
$title = 'Verificación de comodidades';
$description= 'Verificación de comodidades'
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
                        <div class="d-flex justify-content-between">

                            <h2 >{{ $title }}</h2>

                             <div class="">
                                <a href="{{ route('amenities-checks.create') }}" class="btn btn-primary btn-sm">
                                  Crear
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
                                        
										<th>Name</th>
										<th>Amenities Id</th>
										<th>Icon</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amenitiesChecks as $amenitiesCheck)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $amenitiesCheck->name }}</td>
											<td>{{ $amenitiesCheck->amenitiess->name }}</td>
											<td>{{ $amenitiesCheck->icon }}</td>

                                            <td>
                                                <form action="{{ route('amenities-checks.destroy',$amenitiesCheck->id) }}" method="POST">
                                                    {{--<a class="btn btn-sm btn-primary " href="{{ route('amenities-checks.show',$amenitiesCheck->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('amenities-checks.edit',$amenitiesCheck->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
