@extends('layouts.app')
@section('title','Espace Vendeur')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Espace Vendeur/Mon Profile</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}"> Espace Vendeur</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mon Profile</li>
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
                        <p>{{ auth::guard('vendor')->user()->bio }}</p>
                        <div class="row justify-content-center ">
                            <div class="col-md-12">
                                <div class="contact-form-area mb-10">
                                    <form action="{{ route('vendor.update.profile') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control "  value="Crée le:{{ Auth::guard('vendor')->user()->created_at }}" readOnly>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Prénom" name="first_name" value="{{ Auth::guard('vendor')->user()->first_name }}">
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Nom" name="last_name" value="{{ Auth::guard('vendor')->user()->last_name }}">
                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Téléphone" name="phone_number" value="{{ Auth::guard('vendor')->user()->phone_number }}">
                                                    @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ Auth::guard('vendor')->user()->email }}">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror"  name="avatar" >
                                                    @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
<div class="col-12">
    <textarea name="bio" id="" cols="30" rows="10" class="form-control" placeholder="Bio" style="resize: none">{{ Auth::guard('vendor')->user()->bio }}</textarea>
</div>

                                            <div class="col-12">
                                                <button type="submit" class="btn alazea-btn ">Mettre à Jour</button>
                                            </div>

                                        </div>

                                    </form>

                                </div>
                            </div>

                            <div class="col-md-12 mt-5">
                                <div class="contact-form-area mb-10">
                                    <form action="{{ route('vendor.update.password') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="contact-subject" placeholder="Mot de passe" name="password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="contact-subject" placeholder="Confirmer Mot de passe" name="password_confirmation">
                                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn alazea-btn ">Changer Mot de Passe</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
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
                                <a  href="{{ route('logout') }}" onclick="event.preventDefault();
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
