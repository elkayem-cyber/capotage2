@extends('layouts.app')
@section('title','Espace Vendeur')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Espace Vendeur/Commandes/Consulter</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}"> Espace Vendeur</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vendor.commandes') }}"> Commandes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Consulter Commande</li>
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
        <div class="row">
            <div class="col-12">
                @if (session()->has('errs'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> {!! session()->get('errs') !!}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            </div>

        </div>
        <div class="row">
            <div class="col-md-9">

                <section class="single_product_details_area mb-50">
                    <div class="produts-details--content mb-50">
                        <div class="container">
                            <div class="row justify-content-between">

                                <div class="col-12 col-md-6 col-lg-5">
                                    <div class="single_product_thumb">
                                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item">
                                                    <a class="product-img" href="{{ asset($ligne->product->pictures) }}" title="Product Image">
                                                        <img class="d-block w-100" src="{{ asset($ligne->product->pictures) }}" alt="1">
                                                    </a>
                                                </div>
                                                <div class="carousel-item">
                                                    <a class="product-img" href="{{ asset($ligne->product->pictures) }}" title="Product Image">
                                                        <img class="d-block w-100" src="{{ asset($ligne->product->pictures) }}" alt="1">
                                                    </a>
                                                </div>
                                                <div class="carousel-item active">
                                                    <a class="product-img" href="{{ asset($ligne->product->pictures) }}" title="Product Image">
                                                        <img class="d-block w-100" src="{{ asset($ligne->product->pictures) }}" alt="1">
                                                    </a>
                                                </div>
                                            </div>
                                            <ol class="carousel-indicators">
                                                <li class="" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{ asset($ligne->product->pictures) }});">
                                                </li>
                                                <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url({{ asset($ligne->product->pictures) }});" class="">
                                                </li>
                                                <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url({{ asset($ligne->product->pictures) }});" class="active">
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="single_product_desc">
                                        <h4 class="title">{{ $ligne->product->name}}</h4>
                                        <h4 class="price">{{ $ligne->product->price}} EUR</h4>
                                        <div class="short_overview">
                                            <p>{{ $ligne->product->description}}</p>
                                        </div>



                                        <div class="products--meta">
                                            <p><span>Client:</span> <span>{{ $ligne->order->user->first_name }} &nbsp;{{ $ligne->order->user->last_name }}</span></p>
                                            <p><span>Contact:</span> <span>{{ $ligne->order->user->phone_number }}</span></p>
                                            <p><span>Stock:</span> <span>{{ $ligne->product->quantity }}</span></p>
                                            <p><span>Quantité Demandé:</span> <span>{{ $ligne->quantity_requested }}</span></p>
                                            <p><span>Quantité Fourni:</span> <span>{{ $ligne->quantity_accepted }}</span></p>
                                            <p><span>Prix Total:</span> <span>{{ $ligne->quantity_accepted * $ligne->product->price }} EUR</span></p>
                                            <p><span>Acquis:</span> <span>{{$ligne->acquired ? 'Oui' : 'Non'  }}</span></p>

                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    @if( !$ligne->acquired)
                                    <form action="{{ route('vendor.update.quantite',$ligne->id) }}" method="post">

                                        @csrf
                                        <label for="">Modifier La Quantité Foruni</label>
                                        <div class="d-flex Up_Qtt">
                                            <input type="number" class="form-control border-0" name="quantity_accepted" min="0" max="{{ $ligne->quantity_requested }}">
                                            <button type="submit" >
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>


                                    </form>


                                    @endif

                                </div>
                                <div class="col-md-6">
                                    @if( !$ligne->acquired)
                                    <form action="{{ route('vendor.update.state',$ligne->id) }}" method="post">
                                        @csrf
                                        <label for="">Une fois que le client a reçu ses demandes</label>
                                        <button class="btn alazea-btn pl-5 pr-5" type="submit" name="addtocart" class="">
                                            Clôture de la vente

                                        </button>


                                    </form>

                                    @else
                                    Aucune Action Disponible
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>


                </section>


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
<style>
    .Up_Qtt {
        background-color: #f2f4f5;
        padding: 3px;
    }

    .Up_Qtt input {
        background-color: #f2f4f5;
        border: none;
        color: #000000;


    }

    .Up_Qtt input:focus {

        box-shadow: inset 0 -0.1px 0 #ddd;
    }

    .Up_Qtt button {
        background-color: #f2f4f5;
        border: none;
        color: #000000;
        width: 10%;
        cursor: pointer;
        outline: 0 !important;
    }

    .Up_Qtt button :focus {

        border: none;
        outline: 0 !important;

    }

    .Up_Qtt input:focus {
        background-color: #f2f4f5;
        border: none !important;
        color: #000000;
    }

</style>
@endsection
