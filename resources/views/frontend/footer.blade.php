<footer class="text-white text-center text-lg-start fondofooter">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row mt-4">
      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0 normal">
        <h5 class="text-uppercase mb-4">Contactos</h5>

        <p>
          3755 Commercial St SE Salem, Corner with Sunny Boulevard, 3755 Commercial OR 97302
        </p>
        <p>
          (305) 555-4446
        </p>
        <p>
          (305) 555-4555
        </p>
        <p>
          youremail@gmail.com
        </p>

        <p>
          wpestatetheme
        </p>
        <p>
          WP RESIDENCE
        </p>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0 normal">
        <h5 class="text-uppercase mb-4">Categorias</h5>
        @foreach ($tipoPropiedad as $item)

        <p>
          {{$item->nombre}}
        </p>
        @endforeach

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
        <div class="propiedades product">
          <h5 class="text-uppercase mb-4">Ultimas Propiedades</h5>
          @foreach ($productFooter as $key => $product)

          <div class="d-flex foot">
            @foreach ($product->media as $image)

            <img src="{{$image->getUrl()}}" alt="" style="width: 80px; height:80px;">
            @break
            @endforeach
            <div class="textofoot">
              <h6 style="color: #eaeaea;">{{$product->name}}</h6>
              <strong>{{ $setting->moneda }} {{number_format($product->price,2,".",".")}}</strong>

            </div>
          </div>

          @endforeach

        </div>
      </div>

      <div class="mt-4 normal">
        <!-- Facebook -->
        <a type="button" class="btn btn-floating botonfondo btn-lg"><i class="fab fa-facebook-f"></i></a>
        <!-- Dribbble -->
        <a type="button" class="btn btn-floating botonfondo btn-lg"><i class="fab fa-instagram"></i></a>
        <!-- Twitter -->
        <a type="button" class="btn btn-floating botonfondo btn-lg"><i class="fab fa-twitter"></i></a>
        <!-- Google + -->
        <!-- Linkedin -->
      </div>

    </div>
    <!--Grid column-->
  </div>
  <!--Grid row-->

  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3 normal" style="background-color: #001A33; color:rgb(220, 220, 220)">
    Copyrigth@ Todos los derechos reservados . <a href="https://google.com" target="_blank">Desarrollado por Paginas Para Inmobiliarias</a>

  </div>
  <!-- Copyright -->
</footer>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script type="text/javascript">
  // window.addEventListener("scroll", function() {
  //   var header = document.querySelector("header");
  //   header.classList.toggle("abajo", window.scrollY > 0);
  // });




  // $(document).ready(function() {
  //   //-------------------------------SELECT CASCADING-------------------------//
  //   var selectedCountry = (selectedRegion = selectedCity = "");

  //   // This is a demo API key that can only be used for a short period of time, and will be unavailable soon. You should rather request your API key (free)  from http://battuta.medunes.net/
  //   var BATTUTA_KEY = "6a48f8900236fe5673fcf42869adfd49";
  //   // Populate country select box from battuta API
  //   url =
  //     "https://battuta.medunes.net/api/region/co/all/?key=" +
  //     BATTUTA_KEY +
  //     "&callback=?";

  //   // EXTRACT JSON DATA.
  //   $.getJSON(url, function(data) {




  //     $("#region option").remove();

  //     $.each(data, function(index, value) {

  //       console.log(value);
  //       // APPEND OR INSERT DATA TO SELECT ELEMENT.
  //       $("#region").append(
  //         '<option value="' + value.region + '">' + value.region + "</option>"
  //       );
  //     });
  //   });
  //   // Country selected --> update region list .

  //   // Region selected --> updated city list




  //   $("#region").on("change", function() {
  //     selectedRegion = this.options[this.selectedIndex].text;
  //     // Populate country select box from battuta API
  //     countryCode = 'co';
  //     region = $("#region").val();
  //     // console.log(countryCode + " - " + region);
  //     url =
  //       "https://battuta.medunes.net/api/city/" +
  //       countryCode +
  //       "/search/?region=" +
  //       region +
  //       "&key=" +
  //       BATTUTA_KEY +
  //       "&callback=?";
  //     $.getJSON(url, function(data) {
  //       // console.log(data);
  //       $("#city option").remove();
  //       $.each(data, function(index, value) {
  //         // APPEND OR INSERT DATA TO SELECT ELEMENT.
  //         $("#city").append(
  //           '<option value="' + value.city + '">' + value.city + "</option>"
  //         );
  //       });
  //     });
  //   });



  // });





  // In your Javascript (external.js resource or <script> tag)
  $(document).ready(function() {
    $('.select2').select2({
      theme: "classic"
    });
  });
</script>