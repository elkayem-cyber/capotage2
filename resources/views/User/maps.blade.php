
@extends('layouts.app')
@section('title','Détails Vendeur')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Détails Vendeur</h2>
    </div>

    <div class="container-fluid">

<div class="row mt-1 p-0 mb-15">
    <div class="col-12">
        <style>
            #map {
              height: 100vh;
              width: 100%;
            }
          </style>

          <div id="map"></div>
    </div>
</div>
    </div>

</div>



  <script>
    function initMap() {
        const userLat = {{ $userLat }};
        const userLng = {{ $userLng }};

        const userLatLng = { lat: userLat, lng: userLng };
        const map = new google.maps.Map(document.getElementById('map'), {
            center: userLatLng,
            zoom: 15
        });

        // Add a marker for the user's position in blue
        new google.maps.Marker({
            position: userLatLng,
            map: map,
            icon: {
                url: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                scaledSize: new google.maps.Size(50, 50), // Adjust the size of the icon here
            },
            title: 'Votre position'
        });

        // Loop through the vendors to add markers in red
        @foreach($vendors as $vendor)
            const vendorLatLng = { lat: {{ $vendor->lat }}, lng: {{ $vendor->lng }} };

            // Display the distance between the user and the vendor
            const distanceInKm = {{ $vendor->distance }};
            const markerLabel = '{{ $vendor->first_name }} ' + '({{ number_format($vendor->distance, 2) }} km)';

            const vendorMarker = new google.maps.Marker({
                position: vendorLatLng,
                map: map,
                icon: {
                    url: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png',
                    scaledSize: new google.maps.Size(50, 50), // Adjust the size of the icon here
                },
                title: markerLabel
            });

            // Add a click event listener to open the route when clicking on the vendor's marker
            vendorMarker.addListener('click', function() {
                const vendorId = {{ $vendor->id }}; // Replace 'id' with the actual identifier property for the vendor
                const routeUrl = '{{ route("user.vendor_by_id", ":vendorId") }}';
                const vendorRouteUrl = routeUrl.replace(':vendorId', vendorId);
                window.location.href = vendorRouteUrl;
            });
        @endforeach
    }
  </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5YFut7D0a2WFn7L6-PCmjEP92m4yoMMM&libraries=places&callback=initMap" async defer></script>




@endsection

