	
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2zAA0lz2WIp9qYBZd671LqbUaFok9LMc&callback=iniMap" async defer></script>

      <script>

let map='8';
let marker;
let geocoder;
let responseDiv;
let response;
let geo;
let iconBase = "{{asset('img/casa.png')}}"




function iniMap() {
  map = new google.maps.Map(document.getElementById("map"), {
        center: {lat: 4.570868, lng: -74.297333 },   
    zoom: 8,
   
  }); 

    const infoWindow = new google.maps.InfoWindow({
    content: "",
    disableAutoPan: true,
  });


  function activitySelect() {
          $.ajax({
            url: "{{ route('propiedadesMaps') }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
             
        

              $.each(response.data, function(key, value ) {
               let a;
               let b;

               a= value.latitud; 
               b =value.longitud;
              // lat.push(aux) ;


                 var marker = new google.maps.Marker({
                // position: {lat:this.a , lng:this.b},
                map: map,
                title: value.name
                 
                
                
            });
              var latlng = new google.maps.LatLng(a,b)
              marker.setPosition(latlng);

                 marker.addListener("click", () => {
                   infoWindow.setContent(value.name);
      infoWindow.open(map, marker);
    });
           
              });

              
            },
            error: function() {
              alert('Hubo un error obteniendo los datos!');
            }

          });
        }
     activitySelect()

}


   


 	</script> 
    

   

