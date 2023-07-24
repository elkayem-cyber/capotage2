@extends('layouts.app')
@section('title','Espace Vendeur')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Espace Vendeur/Ancienne Vente</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}"> Espace Vendeur</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ancienne Vente</li>
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
            <div class="col-md-9">



                <div class="row">

                    @foreach ($products as $product)


                    <div class="col-md-4">
                        <div class="single-product-area mb-50">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href=""><img src="{{ asset($product->pictures) }}" alt=""></a>
                                <!-- Product Tag -->
                                <div class="product-tag">
                                    <a href="#">
                                        {{ $product->quantity }}
                                    </a>
                                </div>
                                <div class="product-meta d-flex justify-content-between">

                                    @if($product->olignes->count()>0)
                                    @if($product->is_actif)
                                    <form action="{{ route('vendor.update.status.product',$product->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="wishlist-btn"><i class="fa fa-eye-slash" aria-hidden="true" title="Masquer"></i></button>
                                    </form>
                                    @else
                                    <form action="{{ route('vendor.update.status.product',$product->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="wishlist-btn"><i class="fa fa-eye" aria-hidden="true" title="Publier"></i></button>
                                    </form>
                                    @endif

                                    @else
                                    <form action="{{ route('vendor.delete.product',$product->id) }}" method="post">
                                        @csrf
                                        <button type="submit"  class="wishlist-btn"><i class="fa fa-trash"></i></button>
                                    </form>

                                    @endif
                                    <a href="{{ route('vendor.show.product',$product->id) }}" class="compare-btn"><i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="">
                                    <p>{{ $product->name }}</p>
                                </a>
                                <h6>{{ $product->price }} EUR</h6>
                            </div>
                        </div>
                    </div>

                    @endforeach



                </div>

                <!-- Pagination -->
                <div class="row justify-content-center mt-1 mb-3">
                    {{ $products->links('pagination::bootstrap-4') }}
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
