@extends('layouts.app')
@section('title','À propos')
@section('content')

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }});">
        <h2>À propos</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">À propos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="about-us-area section-padding-100-0">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-12 col-lg-5">
              <!-- Section Heading -->
              <div class="section-heading">
                <h2>À PROPOS DE NOUS</h2>
                <p>Nous sommes leaders dans le domaine des services de jardinage.</p>
              </div>

              <!-- Progress Bar Content Area -->
              <div class="alazea-progress-bar mb-50">
                <!-- Single Progress Bar -->
                <div class="single_progress_bar">
                  <p>Plantes de bureau</p>
                  <div id="bar1" class="barfiller">
                    <div class="tipWrap">
                      <span class="tip"></span>
                    </div>
                    <span class="fill" data-percentage="80"></span>
                  </div>
                </div>

                <!-- Single Progress Bar -->
                <div class="single_progress_bar">
                  <p>Gestionnaire de terrain</p>
                  <div id="bar2" class="barfiller">
                    <div class="tipWrap">
                      <span class="tip"></span>
                    </div>
                    <span class="fill" data-percentage="70"></span>
                  </div>
                </div>

                <!-- Single Progress Bar -->
                <div class="single_progress_bar">
                  <p>Design paysager</p>
                  <div id="bar3" class="barfiller">
                    <div class="tipWrap">
                      <span class="tip"></span>
                    </div>
                    <span class="fill" data-percentage="85"></span>
                  </div>
                </div>

                <!-- Single Progress Bar -->
                <div class="single_progress_bar">
                  <p>Entretien des jardins</p>
                  <div id="bar4" class="barfiller">
                    <div class="tipWrap">
                      <span class="tip"></span>
                    </div>
                    <span class="fill" data-percentage="65"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="alazea-benefits-area">
                <div class="row">
                  <!-- Single Benefits Area -->
                  <div class="col-12 col-sm-6">
                    <div class="single-benefits-area">
                      <img src="{{ asset('assets/img/core-img/b1.png') }}" alt="" />
                      <h5>Qualité Exceptionnelle</h5>
                      <p>
                      Chez Ça potage, nous sommes fiers de vous proposer des produits d'une qualité exceptionnelle. Notre engagement envers l'excellence nous permet de vous offrir des récoltes et des produits frais de premier choix. Faites confiance à notre expertise en jardinage pour des résultats qui dépassent vos attentes. 
                      </p>
                    </div>
                  </div>

                  <!-- Single Benefits Area -->
                  <div class="col-12 col-sm-6">
                    <div class="single-benefits-area">
                      <img src="{{ asset('assets/img/core-img/b2.png') }}" alt="" />
                      <h5>Service Attentionné</h5>
                      <p>
                      Nous mettons un point d'honneur à vous offrir un service attentionné et personnalisé. Notre équipe dévouée est là pour répondre à tous vos besoins et vous accompagner dans votre expérience sur la plateforme Ça potage. Nous sommes à votre écoute et nous nous efforçons de vous fournir une expérience utilisateur exceptionnelle. 
                      </p>
                    </div>
                  </div>

                  <!-- Single Benefits Area -->
                  <div class="col-12 col-sm-6">
                    <div class="single-benefits-area">
                      <img src="{{ asset('assets/img/core-img/b3.png') }}" alt="" />
                      <h5>Naturel et Écologique</h5>
                      <p>
                      Nous croyons en l'importance de préserver notre environnement. C'est pourquoi tous nos produits et pratiques respectent une approche naturelle et écologique. En choisissant Ça potage, vous contribuez à la préservation de notre belle planète tout en profitant d'un espace sain et préservé pour cultiver vos fruits et légumes. 
                      </p>
                    </div>
                  </div>

                  <!-- Single Benefits Area -->
                  <div class="col-12 col-sm-6">
                    <div class="single-benefits-area">
                      <img src="{{ asset('assets/img/core-img/b4.png') }}" alt="" />
                      <h5>Engagement Écoresponsable</h5>
                      <p>
                      Nous sommes fiers de notre engagement écoresponsable. Chez Ça potage, nous privilégions des méthodes de jardinage respectueuses de l'environnement, dans le respect de la biodiversité et de l'équilibre écologique. Ensemble, participons à la préservation de notre terre et à la promotion d'une agriculture durable et respectueuse.  
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="border-line"></div>
            </div>
          </div>
        </div>
      </section>

      <section class=" mb-100 cool-facts-area bg-img section-padding-100-0" style="background-image: url({{ asset('assets/img/bg-img/cool-facts.png') }});">
        <div class="container">
            <div class="row">

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="{{ asset('assets/img/core-img/cf1.png') }}" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">{{ App\Models\Product::count() }}</span></h2>
                            <h6>Produits</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="{{ asset('assets/img/core-img/cf2.png') }}" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">{{ App\Models\Order::count() }}</span></h2>
                            <h6>Commandes</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="{{ asset('assets/img/core-img/cf3.png') }}" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">{{ App\Models\User::count() }}</span></h2>
                            <h6>CLIENTS</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="{{ asset('assets/img/core-img/cf4.png') }}" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">{{ App\Models\Vendor::count() }}</span>K+</h2>
                            <h6>Vendeurs</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Side Image -->
        <div class="side-img wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
            <img src="{{ asset('assets/img/core-img/pot.png') }}" alt="">
        </div>
    </section>
</div>



@endsection
