@extends('layouts.app')
@section('title','Produits')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>{{ $product->name }}</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.produits') }}"><i class="fa fa-home"></i> Porduits</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
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
            <section class="single_product_details_area mb-50">
                <div class="produts-details--content mb-50">
                    <div class="container">
                        <div class="row justify-content-between">

                            <div class="col-12 col-md-6 col-lg-5">
                                <div class="single_product_thumb">
                                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item">
                                                <a class="product-img" href="{{ asset($product->pictures) }}" title="Product Image">
                                                    <img class="d-block w-100" src="{{ asset($product->pictures) }}" alt="1">
                                                </a>
                                            </div>
                                            <div class="carousel-item">
                                                <a class="product-img" href="{{ asset($product->pictures) }}" title="Product Image">
                                                    <img class="d-block w-100" src="{{ asset($product->pictures) }}" alt="1">
                                                </a>
                                            </div>
                                            <div class="carousel-item active">
                                                <a class="product-img" href="{{ asset($product->pictures) }}" title="Product Image">
                                                    <img class="d-block w-100" src="{{ asset($product->pictures) }}" alt="1">
                                                </a>
                                            </div>
                                        </div>
                                        <ol class="carousel-indicators">
                                            <li class="" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{ asset($product->pictures) }});">
                                            </li>
                                            <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url({{ asset($product->pictures) }});" class="">
                                            </li>
                                            <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url({{ asset($product->pictures) }});" class="active">
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="single_product_desc">
                                    <h4 class="title">{{ $product->name}}</h4>
                                    <h4 class="price">{{ $product->price}} EUR</h4>
                                    <div class="short_overview">
                                        <p>{{ $product->description}}</p>
                                    </div>



                                    <div class="products--meta">
                                        <p><span>Disponible du:</span> <span>{{ $product->start_date}} &nbsp; au :{{ $product->end_date }}</span></p>
                                        <p><span>Vendeur</span> <span>{{ $product->vendor->first_name}} &nbsp; au :{{ $product->vendor->last_name }}</span></p>


                                    </div>


                                </div>
                                <a class="btn alazea-btn pl-5 pr-5" href="{{ route('user.messages_by_id',$product->vendor->id) }}" name="addtocart" class="">
                                    Contacter Vendeur

                                </a>
                            </div>
                        </div>

                    </div>
                </div>


            </section>
        </div>


    </div>
</div>



@endsection
