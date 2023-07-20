@extends('layouts.app')
@section('title','Espace Vendeur')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Espace Vendeur/Modifier Produit</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}"> Espace Vendeur</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Modifier Produit</li>
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
            <div class="col-md-6">
                <img src="{{ asset($product->pictures) }}" alt="" class="img-fluid" style="height: 13vh">
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <form action="{{ route('vendor.update.product',$product->id) }}" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                <div class="row">
                    <div class="col-12">
                        <h4>Détails Produits</h4>
                    </div>

                    <div class="col-md-4">
                        <label for="">Quantité</label>
                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ $product->quantity }}">


                        @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="">Date Debut</label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" placeholder="" name="start_date" value="{{ $product->start_date }}">
                        @error('start_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="">Date Fin</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $product->end_date }}">
                        @error('end_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="">Prix</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="" name="price" value="{{ $product->price }}">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="">Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="" name="name" value="{{ $product->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('pictures') is-invalid @enderror" placeholder="" name="pictures">
                        @error('pictures')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="">Desciption</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="" style="resize: none" name="description" value="{{ $product->description }}">{{ $product->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-success mt-2 mb-2" type="submit">Mettre à Jour</button>
                    </div>

                </div>
            </form>
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
@endsection
