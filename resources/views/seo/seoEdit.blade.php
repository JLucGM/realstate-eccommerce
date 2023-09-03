@php
    $html_tag_data = [];
    $title = 'SEO';
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
        <!-- Customers List Start -->
        <h2>SEO</h2>
        <h1 class="success">{{$message}}</h1>
        <div class="row">
            <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('seo.update',['id'=>$seo->id]) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <h2>Titulo<br><br>
                            <input class="form-control" type="text" name="title" value="{{$seo->title}}" placeholder="Nombre" required>
                            </h2>
                            <h2>Descripcion<br><br>
                                <input class="form-control" type="text" name="description" value="{{$seo->description}}" placeholder="Descripcion" required>
                            </h2>
                            <h2>Keywords<br><br>
                                <input class="form-control" type="text" name="keywords" value="{{$seo->keywords}}" placeholder="Keywords" required>
                            </h2>
                            <h2>Google_analytics<br><br>
                                <input class="form-control" type="text" name="google_analytics" value="{{$seo->google_analytics}}" placeholder="Google_analytics" required>
                            </h2>
                            <h2>Favicon<br><br>
                                <img src="/img/seo/default.png" id="picture" alt="" srcset="" style="width: 100px">
                                <input class="custom-file-input" type="file" name="image" id="image" required>
                            </h2>
                            <h2>Copyright<br><br>
                                <input class="form-control" type="text" name="copyright" value="{{$seo->copyright}}" placeholder="Copyright" required>
                            </h2>
                            <h2>Telefono<br><br>
                                <input class="form-control" type="text" name="telefono" value="{{$seo->telefono}}" placeholder="Telefono" required>
                            </h2>
                            <h2>Whatsapp<br><br>
                                <input class="form-control" type="text" name="whatsapp" value="{{$seo->whatsapp}}" placeholder="Whatsapp" required>
                            </h2>                  
                            <button class="btn btn-primary btn-lg" type="submit" class="form-submit">Guardar</button>
                        </form>
                    </div>
                </div>
                <script>

                    document.getElementById("image").addEventListener('change',CambiarImagen);
              
                      function CambiarImagen(event) {
                          var file= event.target.files[0];
                          var reader = new FileReader();
                          reader.onload = (event)=>{
                              document.getElementById('picture').setAttribute('src',event.target.result);
                          };
                          reader.readAsDataURL(file);
                      }
              
                  </script>
                <style>
                                       .contenedor{
                        width: 80vw;
                        height: 70vh;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .contenedor .card{
                        width: 60vw;
                        height: 80vh;
                        background: none;
                        background: #1e1e1e;                        
                        padding-top: 0;
                        padding-right: 0%;
                        padding-left: 10%;
                        border-radius: 3%;
                        margin-top: 12vh;
                        place-content: center;
                    }
                    .contenedor .card form{
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 1%;
                        margin-top: 3vh;
                        justify-content: center;
                        align-items: center;
                        text-align: left;
                    }
                    .contenedor input{
                        width: 50%;
                        height: 22px;
                        margin-top: -2vh;
                    }
                    h2{
                        font-size: 1.5vh;
                        text-align: left;
                        display: flex;
                        flex-direction: column;
                        /* align-items: center; */
                    }
                    .btn_style{
                        height: 100%;
                    }
                    .btn_style:hover{
                        height: 100%;
                    }
                </style>

                </div>
            </div>
        </div>
        <!-- Customers List End -->

    
    </div>
@endsection
