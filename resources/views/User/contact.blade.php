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
                    <p><span>Adresse:</span> 505 Silk Rd, New York</p>
                    <p><span>Téléphone:</span> +1 234 122 122</p>
                    <p><span>Email:</span> info.deercreative@gmail.com</p>
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
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">

<h2>ENTREZ EN CONTACT</h2>
            
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-name" placeholder="Votre nom">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="contact-email" placeholder="Votre email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-subject" placeholder="Sujet">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn alazea-btn mt-15">>Envoyer le message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection