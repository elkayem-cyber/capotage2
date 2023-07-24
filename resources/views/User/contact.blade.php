@extends('layouts.app')
@section('title','Contact')
@section('content')

<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>Contact</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Contact Area Info Start ##### -->
<div class="contact-area-info section-padding-0-100">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <!-- Contact Thumbnail -->
            <div class="col-12 col-md-6">
                <div class="contact--thumbnail">
                    <img src="{{ asset('assets/img/bg-img/25.jpg') }}" alt="">
                </div>
            </div>

            <div class="col-12 col-md-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>CONTACTER-NOUS</h2>
                    <p>Nous améliorons nos services pour mieux vous servir.</p>
                </div>
                <!-- Contact Information -->
                <div class="contact-information">
                    <p><span>Adresse:</span> 10 Avenue des Champs-Élysées, 75008 Paris, France
</p>
                    <p><span>Téléphone:</span> +1 234 122 122</p>
                    <p><span>Email:</span> Capotage@gmail.com</p>
                    <p><span>Horaires d'ouverture:</span> Lun - Dim: de 8h à 21h</p>
                    <p><span>Heures de bonheur:</span> Sam: de 14h à 16h</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Contact Area Info End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="contact-area">
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
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">

                    <h2>ENTREZ EN CONTACT</h2>

                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    <form action="{{ route('user.Sendcontact') }}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="contact-name" placeholder="Votre nom" name="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="contact-email" placeholder="Votre email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="contact-subject" placeholder="Sujet" name="subject">
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" cols="30" rows="12" placeholder="Message" style="resize:none !important" name="message"></textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn alazea-btn mt-15">Envoyer le message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d105700.0928590584!2d2.2933517673520527!3d48.85884487595019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1532328708137" allowfullscreen></iframe>
                </div>







            </div>
        </div>
    </div>
</section>
@endsection
