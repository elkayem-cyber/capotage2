@extends('layouts.app')
@section('title','Produits')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Produits</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Produits</li>
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
            <!-- Sidebar Area -->


            <!-- All Products Area -->
            <div class="col-12 ">
                <div class="shop-products-area">
                    <div class="row">
                        @foreach ($products as $product)


                        <!-- Single Product Area -->
                        <div class="col-md-4" >
                            <div class="single-product-area mb-50">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <a href=""><img src="{{ asset($product->pictures) }}" alt=""  style="height:320px !important"></a>

                                    <!-- Product Tag -->
                                   {{--  <div class="product-tag">
                                        <a href="#">
                                            {{ $product->is_actif ? 'Service' :'Produit' }}
                                        </a>
                                    </div> --}}
                                    <div class="product-meta d-flex justify-content-between">

                                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $product->id }}" name="id">
                                            <input type="hidden" value="{{ $product->name }}" name="name">
                                            <input type="hidden" value="{{ $product->price }}" name="price">
                                            <input type="hidden" value="{{ $product->pictures }}" name="pictures">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="wishlist-btn" type="submit"><i class=" fa fa-cart-plus"></i></button>

                                        </form>
                                        <a href="{{ route('user.show_produit',$product->id) }}" class="compare-btn"><i class="fa fa-info"></i></a>
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
                    <div class="row justify-content-center mt-1 mb-3">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                    <!-- Pagination -->

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
