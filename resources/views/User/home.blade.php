@extends('layouts.app')
@section('title','Espace Acheteur')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Espace Acheteur</h2>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
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
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="contact-form-area ">
                    <form action="{{ route('user.update.profile') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="contact-subject" placeholder="Prénom" name="first_name" value="{{ Auth::guard('web')->user()->first_name }}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="contact-subject" placeholder="Nom" name="last_name" value="{{ Auth::guard('web')->user()->last_name }}">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="contact-subject" placeholder="Téléphone" name="phone_number" value="{{ Auth::guard('web')->user()->phone_number }}">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="contact-subject" placeholder="Email" name="email" value="{{ Auth::guard('web')->user()->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <textarea name="address" id="" cols="30" rows="10" class="form-control @error('address') is-invalid @enderror" placeholder="Adresse..." style="resize: none" >{{ Auth::guard('web')->user()->address }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-12">
                                <button type="submit" class="btn alazea-btn mt-1 mb-4">Mettre à Jour</button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
       <div class="col-md-10">
 <form action="{{ route('user.update.password') }}" method="post">
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
            <button type="submit" class="btn alazea-btn mt-1 mb-4">Changer Mot de passe</button>
        </div>

    </div>
</form>
</div>


        </div>
    </div>
</div>

@endsection




