@extends('layouts.app') @section('title','Index') @section('content')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-post-slides owl-carousel">
        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url({{ asset('assets/img/bg-img/1.jpg') }});"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Contenu de la section -->
                        <div class="hero-slides-content text-center">
                            <h2>Bienvenue dans notre jardin communautaire</h2>
                            <p>
                                Découvrez la joie de cultiver vos propres aliments et de vous
                                connecter avec des jardiniers locaux. Rejoignez-nous et
                                cultivons ensemble un avenir plus vert.
                            </p>
                            <div class="welcome-btn-group">
                                <a href="{{ route('user.produits') }}" class="btn alazea-btn mr-30">Nos Produits</a>
                                <a href="{{ route('user.contact') }}" class="btn alazea-btn active"> CONTACTER-NOUS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url({{ asset('assets/img/bg-img/2.jpg') }});"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Bienvenue dans notre jardin communautaire</h2>
                            <p>
                                Découvrez la joie de cultiver vos propres aliments et de vous
                                connecter avec des jardiniers locaux. Rejoignez-nous et
                                cultivons ensemble un avenir plus vert.
                            </p>
                            <div class="welcome-btn-group">
                                <a href="{{ route('user.produits') }}" class="btn alazea-btn mr-30">Nos Produits</a>
                                <a href="{{ route('user.contact') }}" class="btn alazea-btn active"> CONTACTER-NOUS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->

<!-- ##### Service Area Start ##### -->
<section class="our-services-area bg-gray section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>NOS SERVICES</h2>
                    <p>Nous offrons le service parfait pour vous.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-12 col-lg-5">
                <div class="alazea-service-area mb-100">
                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="{{ asset('assets/img/core-img/s1.png') }}" alt="" />
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Partage et Échange de Produits Frais</h5>
                            <p>
                            Rejoignez notre communauté de jardiniers passionnés et profitez du partage et de l'échange de produits frais issus de vos potagers. Mettez en avant vos récoltes de "nano-maraîchage/élevage" et découvrez les délices cultivés avec amour par d'autres membres de la communauté. Échangez des conseils, des recettes et des astuces pour faire prospérer votre potager. 
                            </p>
                        </div>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="{{ asset('assets/img/core-img/s2.png') }}" alt="" />
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Vente de Vos Excédents de Récoltes</h5>
                            <p>
                            Vous avez un potager généreux et souhaitez en faire profiter les autres ? Utilisez notre plateforme pour vendre vos excédents de récoltes à des acheteurs locaux. Proposez vos produits de qualité à petite échelle et contribuez à soutenir une consommation responsable et durable. 
                            </p>
                        </div>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="500ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="{{ asset('assets/img/core-img/s3.png') }}" alt="" />
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Établissement de Liens Locaux</h5>
                            <p>
                            Avec notre système de géolocalisation, découvrez les vendeurs et acheteurs potentiels à proximité de chez vous. Renforcez les liens entre jardiniers passionnés de votre région et favorisez les échanges locaux. Profitez d'une communauté bienveillante où l'entraide est au cœur de nos valeurs. 
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="alazea-video-area bg-overlay">
                    <img src="{{ asset('assets/img/bg-img/23.jpg') }}" alt="" />
                    <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-icon">
                        <i class="fa fa-play" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Service Area End ##### -->

<!-- ##### About Area Start ##### -->
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
<!-- ##### About Area End ##### -->

<!-- ##### Portfolio Area Start ##### -->

<!-- ##### Testimonial Area End ##### -->

<!-- ##### Product Area Start ##### -->
<section class="new-arrivals-products-area bg-gray section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">


                    <h2>NOUVEAUTÉS</h2>
                    <p>
                        Nous avons les derniers produits, cela doit être excitant pour vous.</p>
                </div>
            </div>
        </div>
        @if(App\Models\Product::latest('created_at')->take(8)->count()>0)


        <div class="row">

            @foreach (App\Models\Product::latest('created_at')->take(8)->get() as $product)


            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Product Image -->
                    <div class="product-img">
                        <a href="#"><img src="{{ asset($product->pictures) }}" alt="" style="height: 250px !important" /></a>
                        <!-- Product Tag -->
                        <div class="product-tag">
                            <a href="#">{{ $product->vendor->first_name }} {{ $product->vendor->last_name }}</a>
                        </div>
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

            <div class="col-12 text-center">
                <a href="{{ route('user.produits') }}" class="btn alazea-btn">Voir Tout</a>
            </div>
        </div>
        @else

        <div class="row">
            <h6 class="text-center text-danger">Acucun Produit Disponible pour le moment</h6>
        </div>

        @endif
    </div>
</section>
<section class="new-arrivals-products-area  section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">


                    <h2>Les vendeurs les plus proches</h2>

                </div>
            </div>
        </div>
        <div class="row mt-1 p-0 mb-15">
            <div class="col-12">
                <style>
                    #map {
                        height: 70vh;
                        width: 100%;
                    }
                </style>

                <div id="map"></div>
            </div>
        </div>



    </div>
</section>
<!-- ##### Product Area End ##### -->

<!-- ##### Product Area End ##### -->
<section class="contact-area section-padding-100-0">
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

<script>
    function initMap() {
        const userLat = @json($userLat);
        const userLng = @json($userLng);

        const userLatLng = { lat: userLat, lng: userLng };
        const map = new google.maps.Map(document.getElementById('map'), {
            center: userLatLng,
            zoom: 15
        });

        // Add a marker for the user's position in blue
        new google.maps.Marker({
            position: userLatLng,
            map: map,
            icon: {
                url: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                scaledSize: new google.maps.Size(50, 50) // Adjust the size of the icon here
            },
            title: 'Votre position'
        });

        // Loop through the vendors to add markers in red
        @foreach($vendors as $vendor)
            const vendorLatLng = { lat: @json($vendor->lat), lng: @json($vendor->lng) };

            // Display the distance between the user and the vendor
            const distanceInKm = @json($vendor->distance);
            const markerLabel = '{{ $vendor->first_name }} ' + '({{ number_format($vendor->distance, 2) }} km)';

            const vendorMarker = new google.maps.Marker({
                position: vendorLatLng,
                map: map,
                icon: {
                    url: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png',
                    scaledSize: new google.maps.Size(50, 50) // Adjust the size of the icon here
                },
                title: markerLabel
            });

            // Add a click event listener to open the route when clicking on the vendor's marker
            vendorMarker.addListener('click', function() {
                const vendorId = @json($vendor->id); // Replace 'id' with the actual identifier property for the vendor
                const routeUrl = '{{ route("user.vendor_by_id", ":vendorId") }}';
                const vendorRouteUrl = routeUrl.replace(':vendorId', vendorId);
                window.location.href = vendorRouteUrl;
            });
        @endforeach
    }

</script>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5YFut7D0a2WFn7L6-PCmjEP92m4yoMMM&libraries=places&callback=initMap" async defer></script>

@endsection
