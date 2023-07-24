@extends('layouts.app')
@section('title','Espace Vendeur')
@section('content')
<!-- Your existing HTML code -->

<!-- Votre code HTML existant -->

<script>
    var map;
    var tempMarker;

    function initMap() {
        // Coordonnées de Paris par défaut
        const parisLatLng = { lat: 48.8566, lng: 2.3522 };

        // Récupérer les coordonnées existantes de l'utilisateur (s'il y en a)
        const userLat = parseFloat("{{ Auth::guard('vendor')->user()->lat ?? 0 }}");
        const userLng = parseFloat("{{ Auth::guard('vendor')->user()->lng ?? 0 }}");

        // Vérifier si les coordonnées existent
        const initialLatLng = userLat !== 0 && userLng !== 0 ? { lat: userLat, lng: userLng } : parisLatLng;

        map = new google.maps.Map(document.getElementById('map'), {
            center: initialLatLng,
            zoom: 15
        });

        // Ajouter un marqueur pour les coordonnées existantes de l'utilisateur (s'il y en a)
        if (userLat !== 0 && userLng !== 0) {
            const userMarker = new google.maps.Marker({
                position: { lat: userLat, lng: userLng },
                map: map,
                draggable: true
            });

            // Mettre à jour les champs d'entrée avec les coordonnées existantes
            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');
            latitudeInput.value = userLat;
            longitudeInput.value = userLng;

            // Ajouter un événement 'dragend' au marqueur existant
            userMarker.addListener('dragend', function(event) {
                updateTempMarker(event.latLng);
            });
        }

        // Ajouter un événement 'click' à la carte
        map.addListener('click', function(event) {
            updateTempMarker(event.latLng);
        });
    }

    function updateTempMarker(latLng) {
        if (!tempMarker) {
            // Créer le marqueur temporaire s'il n'existe pas encore
            tempMarker = new google.maps.Marker({
                position: latLng,
                map: map,
                draggable: true
            });
        } else {
            // Mettre à jour la position du marqueur temporaire
            tempMarker.setPosition(latLng);
        }

        const latitudeInput = document.getElementById('latitude');
        const longitudeInput = document.getElementById('longitude');

        latitudeInput.value = latLng.lat();
        longitudeInput.value = latLng.lng();
    }
</script>
{{-- 48.85510876545879  2.351706473541242 --}}

<!-- Reste de votre code HTML -->


<!-- Rest of your HTML code -->


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5YFut7D0a2WFn7L6-PCmjEP92m4yoMMM&callback=initMap&libraries=places" async defer></script>

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Espace Vendeur/Ma Position</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item " aria-current="page"><a href="{{ route('vendor.index') }}">Espace Vendeur </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ma Position</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {!! session()->get('success') !!}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            </div>

        </div>
        <div class="row ">
            <div class="col-md-9">
                <div class="single-widget-area">
                    <div class="row">
                        <div class="col-12">
                            <p>Glisser sur la carte puis Cliquer sur La Button Valider</p>
                        </div>
                        <div class="col-12">
                            <div id="map" style="height: 450px;"></div>
                        </div>
                    </div>
                    <form action="{{ route('vendre.update.position') }}" method="post">
                        @csrf
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <input type="text" id="latitude" name="latitude" class="form-control" value="{{ Auth::guard('vendor')->user()->lat }}" readonly>

                        </div>
                        <div class="col-md-5">
                            <input type="text" id="longitude" name="longitude" class="form-control"  value="{{ Auth::guard('vendor')->user()->lng }}" readonly>
                        </div>
                        <div class="col-md-2">
                          <button class="btn btn-success" type="submit">Valider</button>
                        </div>
                    </div>
                </form>

                </div>

            </div>
            <div class="col-md-3">
                <div class="single-widget-area">
                    <!-- Author Widget -->
                    <div class="author-widget">
                        <div class="author-name">
                            <h4>Menu</h4>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('vendor.profile') }}">Modifier Profile</a>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('vendor.nouvelle_vente') }}">Nouvelle Vente</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('venor.ancienne_ventes') }}">Anciennes Ventes</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('vendor.commandes') }}">Commandes</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('Vendor.mes_messages') }}">Messages</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Déconnexion</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>


                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
