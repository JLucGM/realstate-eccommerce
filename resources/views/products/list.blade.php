 @php
 $html_tag_data = [];
 $title = 'Lista de propiedades';
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
        new DataTable('#tabla-product');
    });
</script>
@endsection




 @section('content')
 <div class="container-fluid">
     <div class="row">
         <div class="col-sm-12">
             <div class="card">
                 <div class="card-header d-flex justify-content-between">
                     <h1 class="card_title">{{$title}}</h1>

                     <a href="{{route('new.product')}}" class="btn btn-primary btn-sm float-right" data-placement="left">
                         {{"Crear" }}
                     </a>
                 </div>
                 @if ($message = Session::get('success'))
                 <div class="alert alert-success">
                     <p>{{ $message }}</p>
                 </div>
                 @endif

                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-striped table-hover" id="tabla-product">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Portada</th>
                                     <th>Nombre de la propiedad</th>
                                     <th>Precio</th>
                                     <th>Estatus</th>
                                     <th class="text-end">Acciones</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($products as $product)

                                 <tr>
                                     <td>{{++$i}}</td>
                                     <td><img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="" style=" width: 70px; height:50px"></td>
                                     <td>{{ $product->name }}</td>
                                     <td>{{ number_format($product->price, 2, ',', '.').' '.$SettingGeneral->monedaSetting->denominacion }}</td>
                                     <td><span class="badge bg-success">{{ $product->status }}</span></td>

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
         </div>
     </div>
 </div>
 @endsection