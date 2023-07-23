@extends('layouts.app')
@section('title','Mes Commandes')
@section('content')
<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Mes Commandes</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mes Commandes</li>
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
            <div class="col-md-8 mx-auto">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>REF</th>
                                <th>
                                    Date
                                </th>
                                <th>Produits</th>
                                <th>

                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>
                                    CM {{ $order->id }}
                                </td>
                                <td>
                                    {{ $order->date }}
                                </td>
                                <td>
                                    {{ $order->olignes->count() }}

                                </td>
                                <td>
                                    @if($order->olignes->count()>0)
                                    <a href="{{ route('user.commande_by_id',$order->id) }}"> <i class="fa fa-eye"></i></a>
                                    @else
                                    <form action="{{ route('user.delete_cmd',$order->id) }}" method="post">
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
</div>

@endsection
