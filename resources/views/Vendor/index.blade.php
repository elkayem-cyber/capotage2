@extends('layouts.app')
@section('title','Espace Vendeur')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Espace Vendeur</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Espace Vendeur</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="single-widget-area">
                    <!-- Author Widget -->
                    <div class="author-widget">
                        <div class="author-thumb-name d-flex align-items-center">
                            <div class="author-thumb">
                                @if(auth::guard('vendor')->user()->avatar)
                                <img src="{{ asset(auth::guard('vendor')->user()->avatar) }}" alt="img-profile">
                                @else
                                <img src="{{ asset('avatar_blanc.png') }}" alt="img-profile">
                                @endif

                            </div>
                            <div class="author-name">
                                <h5>{{ auth::guard('vendor')->user()->first_name }} &nbsp;{{ auth::guard('vendor')->user()->last_name }}</h5>
                                <p>{{ auth::guard('vendor')->user()->email }}</p>
                            </div>
                        </div>
                        @if(auth::guard('vendor')->user()->bio)
                        <p>{{ auth::guard('vendor')->user()->bio }}</p>
                        @else
                        <a href="{{ route('vendor.profile') }}">Ajouter une Bio et Modfier vos coordonnés</a>
                        @endif
                        <br>
                        <a href="{{ route('Vendor.ma_position') }}"><i class="fa fa-map-marker"></i> Mettez vos coordonnées sur la carte</a>


                    </div>
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
