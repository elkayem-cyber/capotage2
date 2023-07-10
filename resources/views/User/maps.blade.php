<!DOCTYPE html>
<html>
<head>
  <title>Maps API Example</title>
  <style>
    #map {
      height: 100vh;
      width: 100%;
    }
  </style>
</head>
<body onload="initMap()">
    <button onclick="getLocation()">Obtenir la position</button>
    <br><br>
    <input type="text" id="positionInput_lat" placeholder="latitude">
    <input type="text" id="positionInput_long" placeholder="longitude">
  <div id="map"></div>

  <script>
 function initMap() {
  // Coordonnées de l'emplacement donné
  var givenPosition = { lat: 37.7749, lng: -122.4194 };

  // Liste des positions à comparer
  var positions = [
    { lat: 34.0522, lng: -118.2437 },
    { lat: 40.7128, lng: -74.0060 },
    { lat: 41.8781, lng: -87.6298 },
    { lat: 39.9526, lng: -75.1652 },
    { lat: 37.3366, lng: -121.8907 },
    { lat: 32.7157, lng: -117.1611 },
    { lat: 33.4484, lng: -112.0740 },
    { lat: 29.7604, lng: -95.3698 },
    { lat: 47.6062, lng: -122.3321 },
    { lat: 51.5074, lng: -0.1278 }
  ];

  var mapOptions = {
    center: givenPosition,
    zoom: 8
  };

  var map = new google.maps.Map(document.getElementById('map'), mapOptions);

  // Calculer la distance entre les positions et l'emplacement donné
  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix({
    origins: [givenPosition],
    destinations: positions.map(function (position) {
      return new google.maps.LatLng(position.lat, position.lng);
    }),
    travelMode: 'DRIVING',
    unitSystem: google.maps.UnitSystem.METRIC
  }, function (response, status) {
    if (status === 'OK') {
      var distances = [];
      for (var i = 0; i < response.rows[0].elements.length; i++) {
        var distance = response.rows[0].elements[i].distance;
        if (distance && distance.value) {
          distances.push(distance.value);
        }
      }

      // Trier les distances par ordre croissant
      var sortedDistances = distances.slice().sort(function(a, b) {
        return a - b;
      });

      // Trouver les 5 distances les plus courtes
      var closestDistances = sortedDistances.slice(0, 5);

      // Trouver les positions correspondant aux distances les plus courtes
      var closestPositions = [];
      for (var j = 0; j < closestDistances.length; j++) {
        var index = distances.indexOf(closestDistances[j]);
        closestPositions.push(positions[index]);
      }

      // Afficher les positions les plus proches sur la carte
      for (var k = 0; k < closestPositions.length; k++) {
        var closestPosition = closestPositions[k];
        var marker = new google.maps.Marker({
          position: closestPosition,
          map: map,
          title: 'Position proche ' + (k + 1)
        });
      }

      // Centrer la carte sur l'emplacement donné
      map.setCenter(givenPosition);
    }
  });
}
function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert("La géolocalisation n'est pas prise en charge par votre navigateur.");
      }
    }

    function showPosition(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      var positionInput_lat = document.getElementById("positionInput_lat");
      positionInput_lat.value = latitude;
      var positionInput_long = document.getElementById("positionInput_long");
      positionInput_long.value = longitude;
    }
  </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5YFut7D0a2WFn7L6-PCmjEP92m4yoMMM&libraries=places"></script>
</body>
</html>
