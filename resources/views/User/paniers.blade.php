@extends('layouts.app')
@section('title','Panier')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Panier</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Panier</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="cart-area section-padding-0-100 clearfix">
    <div class="container">
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
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Produits</th>
                                <th>Quantité</th>
                                <th>Prix (EUR)</th>
                                <th>TOTAL (EUR)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cartItems->count()>0)
                            @foreach ($cartItems as $item)

                            <tr>
                                <td class="cart_product_img">
                                    <a href="#"><img src="{{ $item->attributes->pictures }}" alt="Product"></a>
                                    <h5>{{ $item->name }}</h5>
                                </td>
                                <td>

                                    <form class="qtt" action="{{ route('cart.update') }}" method="POST" class="d-flex">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="number" class="qty-text" step="1" min="1" max="99" name="quantity" value="{{ $item->quantity }}">
                                        <button><i class="fa fa-check" aria-hidden="true"></i></button>
                                    </form>

                                </td>
                                <td class="price"><span>{{ $item->price }}</span></td>
                                <td class="total_price"><span>{{ $item->price * $item->quantity }}</span></td>
                                <td class="action">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">

                                        <button class="border-0 bg-white"><i class="icon_close"></i></button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td colspan="4">Panier ne contient aucun produits</td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Coupon Discount -->
            <div class="col-12 col-lg-6">
                <div class="coupon-discount mt-70">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit">Vider Panier</button>
                    </form>
                </div>
            </div>

            <!-- Cart Totals -->
            <div class="col-12 col-lg-6">
                <div class="cart-totals-area mt-70">
                    <h5 class="title--">Paiement</h5>


                    <div class="total d-flex justify-content-between">
                        <h5>Total</h5>
                        <h5> {{ Cart::getTotal() }} EUR</h5>
                    </div>
                    @if( Cart::getTotal()>0 )

                    <div class="checkout-btn">
                        <form action="{{route('users.checkout')}}" method="POST">
                            @csrf
                        <button type="submit" class="btn alazea-btn w-100"> Commander</button>
                        </form>
                    </div>

                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
<style>
    .qtt {
        display: flex;
        flex-direction: row;

    }

    .qtt input {
        background-color: #f2f4f5;
        border: #f2f4f5;
        text-align: center;
        padding: 10px !important;
    }

    .qtt button {
        background-color: #f2f4f5;
        border: #f2f4f5;
        text-align: center;
        padding: 10px !important;
    }

    .qtt button i {
        color: black !important;
        font-size: 20px !important;

    }

</style>
@endsection
