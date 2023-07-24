<footer class="footer-area bg-img" style="background-image: url({{ asset('assets/img/bg-img/3.jpg') }});">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="#"><img src="{{ asset('assets/img/core-img/logo.png') }}" alt=""></a>
                        </div>
                        <p>Bienvenue sur Capotage, votre destination pour le jardinage communautaire.</p>
                        <div class="social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>LIENS RAPIDES</h5>
                        </div>
                        <nav class="widget-nav">
                            <ul>
                                <li><a href="#">Acheter</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Paiement</a></li>
                                <li><a href="#">Actualités</a></li>
                                <li><a href="#">Retour</a></li>
                                <li><a href="#">Publicité</a></li>
                                <li><a href="#">Livraison</a></li>
                                <li><a href="#">Carrière</a></li>
                                <li><a href="#">Commandes</a></li>
                                <li><a href="#">Politiques</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>MEILLEURE VENTE</h5>
                        </div>
                        @foreach (App\Models\Product::withCount('olignes as total_quantity_accepted')
                        ->orderByDesc('total_quantity_accepted')
                        ->limit(2)
                        ->get() as $product)
                        <div class="single-best-seller-product d-flex align-items-center">
                            <div class="product-thumbnail">
                                <a href="{{ route('user.show_produit',$product->id) }}"><img src="{{ asset($product->pictures) }}" alt=""></a>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('user.show_produit',$product->id) }}">{{ $product->name }}</a>
                                <p>{{ $product->price }} EUR</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>CONTACT</h5>
                        </div>

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
    </div>

    <!-- Footer Bottom Area -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
                <!-- Copywrite Text -->
                <div class="col-12 col-md-6">
                    <div class="copywrite-text">
                        <p>&copy;
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <script>
                                document.write(new Date().getFullYear());

                            </script> Tous les droits sont réservés | developé avec <i class="fa fa-heart-o" aria-hidden="true"></i> par <a href="{{ route('user.index') }}" target="_blank">Capotage</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <!-- Footer Nav -->
                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <nav>
                            <ul>
                                <li><a href="{{ route('user.index') }}">Accueil</a></li>
                                <li><a href="{{ route('user.about') }}">À propos</a></li>

                                <li><a href="{{ route('user.produits') }}">Produits</a></li>
                                <li><a href="{{ route('user.contact') }}">Contact</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
