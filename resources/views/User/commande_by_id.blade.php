@extends('layouts.app')
@section('title','Mes Commandes')
@section('content')
<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2> Commande</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.commandes') }}"><i class="fa fa-home"></i> Mes Commandes</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Commande</li>
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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>

                        </tr>
                        <tr>
                            <th>


                                Produits
                            </th>
                            <th>
                                Prix
                            </th>
                            <th>
                                Q Demandés
                            </th>
                            <th>
                                Q Fournis
                            </th>
                            <th>
                                à payé
                            </th>
                            <th>

                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        @foreach ( $lignes as $ligne)
                        <tr>
                            <td class=" align-middle">
                                <img src="{{ $ligne->product->pictures }}" class="img-fluid rounded-circle" height="40px" width="40px">

                                {{ $ligne->product->name }}
                            </td>
                            <td class=" align-middle">
                                {{ $ligne->price }} EUR
                            </td>
                            <td class=" align-middle">
                                {{ $ligne->quantity_requested }}
                            </td>
                            <td class=" align-middle">
                                {{ $ligne->quantity_accepted }}
                            </td>
                            <td class=" align-middle">
                                @if($ligne->quantity_accepted>0)
                                {{ $ligne->price * $ligne->quantity_accepted}} EUR
                                @else
                                {{ $ligne->price * $ligne->quantity_requested}} EUR
                                @endif
                            </td>
                            <td>
                                @if($ligne->acquired)
                                <span class="text-white bg-success rounded p-1"> Produit Récu</span>
                                @else
                                <form action="{{ route('user.delete_ligne',$ligne->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>


    </div>
</div>

@endsection
