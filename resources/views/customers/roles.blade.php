@php
    $html_tag_data = [];
    $title = 'Lista de roles';
    $description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-auto mb-3 mb-md-0 me-auto">
                    <div class="w-auto sw-md-30">
                    
                           
                  
                        <h2 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h2>
                    </div>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-3 d-flex align-items-end justify-content-end">
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Controls Start -->
        <div class="row mb-2">
            <!-- Search Start -->
            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control" placeholder="Search" />
                    <span class="search-magnifier-icon">
          <i data-acorn-icon="search"></i>
        </span>
                    <span class="search-delete-icon d-none">
          <i data-acorn-icon="close"></i>
        </span>
                </div>
            </div>
            <!-- Search End -->
        </div>
        <!-- Controls End -->

        <!-- Customers List Start -->
     



       <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                     
                                        
										<th>Id</th>
										<th>Name</th>
									

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($roles as $rol)
                                   
                                        <tr>
                                           

                                            
											<td>{{ $rol->id}}</td>
											<td>{{ $rol->name}}</td> 
                                         

                                        


                                            <td class="text-end">

                                                   <form action="{{route('roles.delete',['id'=>$rol->id])}}" method="GET">
                                                    {{-- <a class="btn btn-sm btn-success" href="{{ route('roles.edit',$rol->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a> --}}
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
@endsection
