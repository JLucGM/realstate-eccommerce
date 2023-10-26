	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2zAA0lz2WIp9qYBZd671LqbUaFok9LMc&callback=iniMap" async defer></script>

	<script>
	  let map = '8';
	  let marker;
	  let geocoder;
	  let responseDiv;
	  let response;
	  let geo;
	  let iconBase = "{{asset('img/casa.png')}}"

	  const datos = <?php echo json_encode($productsSearchMap); ?>

	  function iniMap() {
	    map = new google.maps.Map(document.getElementById("map"), {
	      center: {
	        lat: parseFloat(datos[0].latitud),
	        lng: parseFloat(datos[0].longitud)
	      },
	      zoom: 8,

	    });

	    const infoWindow = new google.maps.InfoWindow({
	      content: "",
	      disableAutoPan: true,
	    });

	    function activitySelect() {

	      $.each(datos, function(key, value) {
	        let a;
	        let b;

	        a = parseFloat(value.latitud);
	        b = parseFloat(value.longitud);
	        // lat.push(aux) ;

	        var marker = new google.maps.Marker({
	          // position: {lat:this.a , lng:this.b},
	          map: map,
	          title: value.name,
	          // icon: iconBase

	        });
	        var latlng = new google.maps.LatLng(a, b)
	        marker.setPosition(latlng);

	        marker.addListener("click", () => {
	          infoWindow.setContent(value.name);
	          infoWindow.open(map, marker);
	        });
	      });
	    }
	    activitySelect()
	  }
	</script>