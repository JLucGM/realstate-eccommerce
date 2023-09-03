@php
    $html_tag_data = [];
    $title = 'Lista de info';
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
                                {{"Informacion Principal"}}
                                </h2> 
                            </span>

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
                                        
										<th>Porque ELejirnos</th>
										<th>Vendemos Tu Casa</th>
										<th>Rentamos Tu Casa</th>
										<th>Compramos Tu Casa</th>
										<th>Marketing Gratis</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infoWebs as $infoWeb)
                                        <tr>
                                            
											<td>{{ $infoWeb->select_us }}</td>
											<td>{{ $infoWeb->sell_home }}</td>
											<td>{{ $infoWeb->rent_home }}</td>
											<td>{{ $infoWeb->buy_home }}</td>
											<td>{{ $infoWeb->marketing_free }}</td>

                                            <td class="text-end">
                                                <form action="{{ route('info-webs.destroy',$infoWeb->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('info-webs.show',$infoWeb->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('info-webs.edit',$infoWeb->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button> --}}
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
